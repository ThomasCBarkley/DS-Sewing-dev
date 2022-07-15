<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\DsDB;

use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{

	public function getCart()
	{
		return $this->showCart();
    }

	public function postInCart(Request $request)
	{
		if (!$pid = $request->pid) return redirect('dan/tinycart');

		if ($weight = $request->weight) $pid = $pid.$weight;
		if ($colour = $request->colour) $pid = $pid.$colour;

		$qty = 0 + $request->qty;
		if ($qty == 0) { $qty = 1; }

		DsDB::addItem2Cart([$this->sessionID, $pid, $qty]);
		return redirect('dan/tinycart');
	}

	public function postUpdate(Request $request)
	{
		if (!$action = $request->action) {
			return $this->showCart();
		}
		switch ($action) {
			case 'update':
				$this->update($request);
				break;
			case 'remove' :
				$this->remove($request);
				break;
		}
		return $this->showCart();
    }

	private function showCart()
	{
		$cartItems = DsDB::getCartItems([$this->sessionID]);
		return Response::view('cart.index', ['items' => $cartItems]);
    }

    private function remove(Request $request)
	{
		if ($id = $request->id)
			DsDB::delItemCart($id);
	}

	private function update(Request $request)
	{
		$id = $request->id;
		if ($id && $qty = $request->qty)
			DsDB::updateItemCart($id, $qty);
	}

}
