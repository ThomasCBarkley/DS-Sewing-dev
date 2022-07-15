<?php

namespace App\Helpers;

use LVR\CreditCard\Factory;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardExpirationMonth;
use LVR\CreditCard\ExpirationDateValidator;
use LVR\CreditCard\Exceptions\CreditCardException;

class Validator
{
	private static $equiredFields = [
		1 => ['AcctName', 'AcctAddress1', 'AcctCity', 'AcctState', 'AcctZip', 'AcctPhone'],
		2 => ['ShipName','ShipAddress1','ShipCity','ShipState','ShipZip', 'AddressType'],
		3 => [],
		4 => ['ContactPhoneNumber','BillAddress1','BillCity','BillState','BillZip','EmailAddress'],
	];

	public static function validateFields(\Illuminate\Http\Request $request, $step)
	{
		if (!isset(self::$equiredFields[$step])) return [];

		$requestFields = $request->all();
		$missed = [];
		foreach (self::$equiredFields[$step] as $field) {
			if ($requestFields[$field] == '')
				$missed[] = $field;
		}

		return $missed;
	}

	public static function creditCartValidate(\Illuminate\Http\Request $request)
	{
		if ($request->PaymentMethod == 'CHECK/MO') return null;

		try {
			$cc = Factory::makeFromNumber($request->CreditCardNumber);

			if (strtolower($request->PaymentMethod) != $cc->name()) {
				return 'Please enter a valid cart type.';
			}

			$cc->isValidCardNumber();

			if (!$cc->isValidCvc($request->CVV2)) {
				return 'Please enter a valid CVV code.';
			}

			if (!ExpirationDateValidator::validate($request->ExpYear, $request->ExpMonth)) {
				return 'Either the card has expired or entered data appears to be invalid.';
			}

		} catch (CreditCardException $e) {
			return $e->getMessage();
		}

		return null;
	}
}