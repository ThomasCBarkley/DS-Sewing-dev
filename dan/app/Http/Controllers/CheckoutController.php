<?php

namespace App\Http\Controllers;

use App\Helpers\ShippingMethods\Shiprite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Helpers\DsDB;

use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Crypt;

use App\Helpers\ShippingMethods\Ups;
use App\Helpers\Validator;


class CheckoutController extends Controller
{

	public function getIndex(Request $request)
	{
		return $this->getStep(1, $request);
	}

	public function getStep($id, Request $request)
	{
		$shipping = $cart_items = [];
		switch ($id) {
			case 3 : // shipping step
				$shipping = $this->getShippingMethods();
				if (!$shipping) {
					return redirect('/dan/tinycart/checkout/1');
				}
				break;

			case 5 : // confirmation step
				$cart_items = DsDB::getCartItems([$this->sessionID]);
				if (empty($cart_items)) {
					return redirect('/dan/tinycart/checkout/1');
				}
				break;

			case 6 : // Finished
				return Response::view('errors.error', ['message' => '']);
				break;
		}
		$tableData = DsDB::getCheckoutTemp($this->sessionID);

		$data = [
			'nextStepUrl' => '/dan/tinycart/checkout/'.($id+1),
			'currentStep' => $id,
			'request'	=> $request,
			'shipping'	=> $shipping,
			'table_data' => $tableData,
			'cart_items' => $cart_items
		];
		return Response::view('checkout.index', $data);
    }

	public function postStep($id, Request $request)
	{
		$missedFields = Validator::validateFields($request, $id-1);
		if (!empty($missedFields)) {
			return Response::view('errors.missed-fields', ['missed' => $missedFields]);
		}

		DsDB::updateCheckoutTemp($this->sessionID, $request->except('_token'));
		$shipping = $cart_items = [];

		switch ($id) {
			case 3 : // shipping step
				$shipping = $this->getShippingMethods($request->AddressType);
				break;

			case 5 : // confirmation step
				if ($message = Validator::creditCartValidate($request)) {
					return Response::view('errors.error', ['message' => $message]);
				}
				$cart_items = DsDB::getCartItems([$this->sessionID]);
				break;

			case 6 : // Finished
				$orderId = DsDB::addOrder($this->sessionID);
				$data = [
					'table_data' => DsDB::getOrder($orderId, $this->sessionID),
					'cart_items' => DsDB::getCartItems([$this->sessionID])
				];

				$this->sendMail($data, $data['table_data']->EmailAddress, "Order ".$orderId." has been placed. You should go check it out!");
				$this->sendMail($data, env('MAIL_MAIN_ADDRESS'), 'Thank you for your order');

				session(['oldSessionID' => $this->sessionID]);
				$request->session()->put('oldSessionID', $this->sessionID);

				$this->setSessionID($request);
				return redirect('/dan/tinycart/order/'.$orderId);
				break;
		}

		$tableData = DsDB::getCheckoutTemp($this->sessionID);

		$data = [
			'nextStepUrl' => '/dan/tinycart/checkout/'.($id+1),
			'currentStep' => $id,
			'shipping'	=> $shipping,
			'table_data' => $tableData,
			'cart_items' => $cart_items
		];

		return Response::view('checkout.index', $data);
	}

	public function getOrder(Request $request, $orderId)
	{
		if (!$request->session()->exists(('oldSessionID'))) {
			$sessionID = $request->session()->get('oldSessionID');
		} elseif (!$sessionID = session('oldSessionID')) {
			$sessionID = $this->sessionID;
		}

		if ($table_data = DsDB::getOrder($orderId, $sessionID)) {
			$data = [
				'table_data' => $table_data,
				'cart_items' => DsDB::getCartItems([$sessionID])
			];
			return Response::view('checkout.thanks', $data);
		}

		return Response::view('errors.miss-order', ['orderId' => $orderId]);
	}

	private function getShippingMethods($addressType)
	{
		if (!$checkoutTempData = DsDB::getCheckoutTemp($this->sessionID)) {
			return false;
		}
		$shipzip = $checkoutTempData->ShipZip;

		$data = DsDB::getCartCalculateShip($this->sessionID);
		$total_weight = $temp_weight = $ups = $shipments = $oversized = $max_weight = $total_items = 0;
		
		$classes = [];
		foreach ($data as $row) {
			$total_weight += $row->weight * $row->qty;

			$qty = $row->qty;
			while($qty>0) {
				$temp_weight += $row->weight;
				
				if ($row->oversized != '1'){
					if ($temp_weight + $row->weight > 70) {
						# this is one shipment
						$ups += Ups::getRate($shipzip, $temp_weight, $addressType);
						$shipments += 1;
						$temp_weight = 0;
					}
				}
				$qty = $qty - 1;
			}

			$oversized += $row->oversized;

			if (empty($classes[$row->class])) {
				$classes[$row->class]['weight'] = 0;
				$classes[$row->class]['length'] = 0;
				$classes[$row->class]['width'] = 0;
				$classes[$row->class]['height'] = 0;
				$classes[$row->class]['qty'] = 0;
			}

			$classes[$row->class]['weight'] += $row->weight * $row->qty;
			$classes[$row->class]['qty'] += $row->qty;
			if ($row->length > $classes[$row->class]['length'])
				$classes[$row->class]['length'] = $row->length;
			if ($row->width > $classes[$row->class]['width'])
				$classes[$row->class]['width'] = $row->width;
			if ($row->height > $classes[$row->class]['height'])
				$classes[$row->class]['height'] = $row->height;

			if ($row->weight > $max_weight) {
				$max_weight = $row->weight;
			}
			$total_items += $row->qty;

            if($row->oversized != '1') {
                if ($temp_weight > 0)	{
                    $ups += Ups::getRate($shipzip, $temp_weight, $addressType);
                }
            }
		}

		$shipIncrease = config('app.ship_increase');
		if ($ups > 0) {
			$ups = sprintf("%0.2f", $ups) + ($shipments * $shipIncrease);
		}

		if ($max_weight > 150 || $oversized != 0 || $ups == 0) {
			$shipmethod='LTL';
		} else {
			$shipmethod='UPSGROUND';
		}

		$estes_total = Shiprite::getTotal($shipzip, $this->sessionID, $classes, $checkoutTempData->addresstype);
		if ($estes_total > 0) {
			$estes_total = $estes_total + ($shipments * $shipIncrease);
		}

		return [
			'shipmethod' => $shipmethod,
			'methods'	=> [
				'LTL' 		=> ['cost' => $estes_total, 'title' => 'LTL Freight'],
				'UPSGROUND'	=> ['cost' => $ups, 'title' => 'UPS Ground'],
			]
		];
	}

	private function sendMail($data, $to, $subject)
	{
		try {
			Mail::send('emails.confirm_order', $data, function ($m) use ($to, $subject) {
				$m->to($to)->subject($subject)->replyTo(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
			});
		} catch(\Swift_TransportException $e) {

		}
	}
}
