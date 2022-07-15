<?php

namespace App\Helpers\ShippingMethods;

use App\Helpers\DsDB;

class Ups
{
	public static function getRate($shipzip, $weight, $addressType)
	{
		if ($weight < 1) { $weight = 1; }

		$threezee = substr($shipzip, 0, 3);

 		$zoneData = DsDB::getUpsZone($threezee);

 		if (!$zoneData) { return 0; }

 		$priceData = DsDB::getUpsGroundRate($weight, $zoneData->zone);

 		if (!$priceData) {return 0; }

 		$price = $priceData->price;
		if($weight > 49){
			$price=$price+30;
		}

		if ($addressType == 'Residential') {
			return ($price + config('app.ship_increase')) * config('app.ship_ups_fuel');
		}

		return $price * config('app.ship_ups_fuel');
	}
}