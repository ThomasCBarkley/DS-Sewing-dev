<?php

namespace App\Helpers\ShippingMethods;

use App\Helpers\DsDB;
use Carbon\Carbon;

class Shiprite
{
	private static $destinationType = [
		'Residential' 	=> 'R',
		'Commercial' 	=> 'C',
		'Farm' 			=> 'R',
	];

	public static function getTotal($shipzip, $sid, $classes, $destinationType)
	{
		DsDB::clearCartClasses($sid);
		$details = [];
		foreach ($classes as $class => $data) {
			$details[] = self::formatDetails($class, $data);
			DsDB::addCartClassesItem([$sid, $class, 0, $data['weight']]);
		}
		$data = [
			'shipzip' 	=> $shipzip,
			'details'	=> $details,
			'destinationType' => self::$destinationType[$destinationType]
		];

		return self::getRate($data);
	}

	public static function getRate($data)
	{
		$shipdate = Carbon::now()->addMonth()->format('Y-m-d');
		$from_zip= self::getFromZip($data['shipzip']);
		$data['from_zip'] = $from_zip;
		$data['shipdate'] = $shipdate;

		$response = self::getData($data);

		if ($response) {
			$names = [];
			$count = 0;
			foreach ($response as $carrier) {
				$names[$count] = $carrier['finalcharge'];
				$count++;
			}

			if ($count == 1) {
				return $names[0];
			}

			$avr = $count/2;
			return $names[(int)$avr];
		} else {
			return 0;
		}
	}

	private static function getToken()
	{
		$url = config('app.shiprite.url').'Login';

		$data = [
			'username' => config('app.shiprite.username'),
			'password' => config('app.shiprite.password'),
		];
		$payload = json_encode($data);
		$response = self::sendRequest($url, $payload);

		if (!$response) {
			return false;
		}

		$responceArr = json_decode($response, true);
		if (isset($responceArr['jwt'])) {
			return $responceArr['jwt'];
		}

		return false;
	}

	private static function getData($data)
	{
		if (!$token = self::getToken()) {
			return 0;
		}

		$json = [
			"fromzip"=> $data['from_zip'],
			"fromcountry"=> "US",
			"originType"=> "C",
			"originCallAppt"=> false,
			"tozip"=> $data['shipzip'],
			"tocountry"=> "US",
			"destinationType"=> $data['destinationType'],
			"destinationCallAppt"=> false,
			"shipdate"=> $data['shipdate'],
			"tsa"=> false,
			"detail"=> $data['details'],
			"accessorials"=> [],
			"unitmeasurement"=> "U",
			"direction"=> "inbound"
	    ];

		$payload = json_encode($json);
		$url = config('app.shiprite.url').'integrations/rate';
		$response = self::sendRequest($url, $payload, $token);

		if ($response) {
			$responceArr = json_decode($response, true);
			if (!empty($responceArr['dto']['carriers'])) {
				return $responceArr['dto']['carriers'];
			}
		}

		return false;
	}

	private static function sendRequest($url, $data, $token = null)
	{
		$header[] = 'Content-Type:application/json';
		if ($token) {
			$header[] = 'Authorization:'. $token;
		}

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);

		curl_close($ch);
		return $result;
	}

	private static function getFromZip($shipzip)
	{
		$zip = [
			'80640', #0
			'80640', #1
			'80640', #2
			'80640', #3
			'80640', #4
			'77029', #5
			'95691', #6
			'15205', #7
			'15205', #8
			'64120', #9
		];
		$letter = substr($shipzip, 0, 1);
		return $zip[$letter];
	}

	private static function formatDetails($class, $data)
	{
		$cube = round(
			($data['height'] > 0 ? $data['height'] : 1) * ($data['width'] > 0 ? $data['width'] : 1) *
			($data['length'] > 0 ? $data['length'] : 1) / 1728,
			3);
		$cube =  ($cube > 0 ? $cube : 1);

		return [
			'class'=> $class,
			'stackable'=> 0,
			'units'=> 1,
			'qty'=> $data['qty'],
			'length'=> $data['length'],
			'width'=> $data['width'],
			'height'=> $data['height'],
			'weight'=> ($data['weight']+1),
			'cube'=> $cube
		];
	}
}