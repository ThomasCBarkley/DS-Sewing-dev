<?php

namespace App\Helpers;

use DB;
use \Carbon;

class DsDB
{
	public static function getCartItems($params)
	{
		$sql = "select C.pid, C.price, C.qty, description, image, C.weight, C.length, C.width, C.height, id, C.price - (isnull((select max(discount) from promo P inner join promoitem PP on PP.code = P.code and PP.pid = C.pid inner join sessionpromo SP on SP.code = P.code where SP.sid = C.sessionid) , 0) * C.price) as discountprice from cart C LEFT JOIN catalog ON C.pid = catalog.pid where sessionid = ?";
		return DB::select($sql, [$params[0]]);
	}

	public static function isItemInCart($params)
	{
		return DB::table('cart')
			->where('sessionID', $params[0])
			->where('pid', $params[1])
			->exists();
	}

	public static function addItem2Cart($params)
	{
		if (!self::isItemInCart($params)) {
			$items = DB::select("SELECT price,isnull(weight,10.0) as weight, length, width, height FROM catalog WHERE pid=?", [$params[1]]);
			foreach ($items as $item) {
				DB::insert("INSERT INTO cart (sessionID,pid,price,qty,weight, length, width, height) VALUES (?,?,?,?,?,?,?,?)",
					[$params[0], $params[1], $item->price, $params[2], $item->weight, $item->length, $item->width, $item->height]);
			}
		}
	}

	public static function getNewSessionID($data)
	{
		DB::update("UPDATE sessionCounter SET ID=ID+1");
		$sessionID = DB::table('sessionCounter')->first();

		$sql = "INSERT INTO sessionID (timestamp,referer,remote_addr,user_agent,sessionID) VALUES(?,?,?,?,?)";
		DB::insert($sql, [
			time(),
			$data['referer'],
			$data['remote_addr'],
			$data['user_agent'],
			$sessionID->ID
		]);

		return $sessionID->ID;
	}

	public static function delItemCart($id)
	{
		DB::delete("DELETE FROM cart WHERE id=?", [$id]);
	}

	public static function updateItemCart($id, $qty)
	{
		DB::update("UPDATE cart SET qty=? WHERE id=?", [$qty, $id]);
	}

	public static function clearCart($sid)
	{
		DB::delete("DELETE FROM cart WHERE sessionID=?", [$sid]);
	}

	public static function getCheckoutTemp($sid)
	{
		return DB::table('checkoutTemp')->where('sessionID', $sid)->first();
	}

	public static function updateCheckoutTemp($sid, $data)
	{
		if (empty($data)) return;

		if (!DB::table('checkoutTemp')->where('sessionID', $sid)->exists()) {
			DB::insert('INSERT INTO checkoutTemp (sessionID) VALUES (?)', [$sid]);
		}

		if (isset($data['ExpMonth']) && isset($data['ExpYear'])) {
			$exp_date = \Carbon\Carbon::parse($data['ExpYear'].'-'.$data['ExpMonth'].'-'.'01')->format('Y-m-d');

			unset($data['ExpMonth']);
			unset($data['ExpYear']);
			$data['ExpirationDate'] = $exp_date . ' 12:00:00 AM';
		}

		$sql = 'UPDATE checkoutTemp SET ' . implode("=?, ", array_keys($data)) . "=? WHERE sessionID=?";
		$data[] = $sid;
		DB::update($sql, array_values($data));
	}

	public static function clearCheckoutTemp($sid)
	{
		DB::delete("DELETE FROM checkoutTemp WHERE sessionID=?", [$sid]);
	}

	public static function getCartCalculateShip($sid)
	{
		$sql = "SELECT cart.weight, cart.qty, catalog.oversized, catalog.class, cart.length, cart.width, cart.height FROM cart, catalog WHERE sessionID = ? and catalog.pid = cart.pid";
		return DB::select($sql, [$sid]);
	}

	public static function getUpsZone($threezee)
	{
		return DB::table('ups_zones')
			->select('zone')
			->whereRaw("$threezee>=zip_low and $threezee<=zip_high")
			->first();
	}

	public static function getUpsGroundRate($weight, $zone)
	{
		return DB::table('ups_ground_rate')
			->selectRaw("z$zone as price")
			->whereRaw("weight = floor($weight+0.5)")
			->first();
	}

	public static function clearCartClasses($sid)
	{
		DB::delete("DELETE FROM cart_classes WHERE sessionID=?", [$sid]);
	}

	public static function addCartClassesItem($params)
	{
		DB::insert("INSERT INTO cart_classes (sessionID, class, cost, weight) VALUES(?,?,?,?)", $params);
	}

	public static function addOrder($sessionId)
	{
		$sql = "
			insert into orders 
					(dateadded, sessionID, AcctCompany, AcctName, AcctAddress1, AcctAddress2, AcctCity, AcctState, AcctZip, AcctPhone, AcctFax, AcctCell, BillCompany, BillName, 
					  BillAddress1, BillAddress2, BillCity, BillState, BillZip, BillPhone, ShipCompany, ShipName, ShipAddress1, ShipAddress2, ShipCity, ShipState, ShipZip, 
                      ShipPhone, PaymentMethod, CreditCardNumber, ExpirationDate, CVV2, ShippingMethod, EstShipCost, ContactPhoneNumber, EmailAddress, SalesTax, 
                      OrderProcessed, addresstype)
			select GETDATE(), sessionID, AcctCompany, AcctName, AcctAddress1, AcctAddress2, AcctCity, AcctState, AcctZip, AcctPhone, AcctFax, AcctCell, BillCompany, BillName, 
                      BillAddress1, BillAddress2, BillCity, BillState, BillZip, BillPhone, ShipCompany, ShipName, ShipAddress1, ShipAddress2, ShipCity, ShipState, ShipZip, 
                      ShipPhone, PaymentMethod, CreditCardNumber, ExpirationDate, CVV2, ShippingMethod, EstShipCost, ContactPhoneNumber, EmailAddress, SalesTax, 
                      0, addresstype
			from checkoutTemp
			where sessionID = ? 		
		";

		DB::insert($sql, [$sessionId]);
		$orderId = DB::getPdo()->lastInsertId();
		self::addOrderDetails($orderId, $sessionId);

		return $orderId;
	}

	public static function addOrderDetails($orderId, $sessionId)
	{
		$sql = "
			insert order_detail select $orderId , pid, price, (isnull((select max(discount) from promo P inner join promoitem PP on PP.code = P.code and PP.pid = C.pid inner join sessionpromo SP on SP.code = P.code where SP.sid = C.sessionid) , 0)), weight,qty, 
				(select top 1 P.code from promo P inner join promoitem PP on PP.code = P.code and PP.pid = C.pid inner join sessionpromo SP on SP.code = P.code where SP.sid = C.sessionid)
				from cart C where sessionid=$sessionId		
		";
		DB::insert($sql);
	}

	public static function getOrder($orderId, $sessionId)
	{
		return DB::table('orders')
			->where('sessionID', $sessionId)
			->where('ID', $orderId)
			->first();
	}

	public static function getFabricSizeToPid($data)
	{
		//$data['txtFabric'], $data['vLength'], $data['vWidth'], $data['txtColour'], $data['vShape'])
		$result = DB::select("exec sp_Fabric_SizeToPid ?,?,?,?,?", $data);
		return isset($result[0]) ? $result[0] : null;
	}

	public static function getFabricSizeToPid2($data)
	{
		//$data['txtFabric'], $data['vLength'], $data['vWidth'], $data['vHeight'], $data['txtColour'], $data['vShape'])
		$result = DB::select("exec sp_Fabric_SizeToPid2 ?,?,?,?,?,?", $data);
		return isset($result[0]) ? $result[0] : null;
	}

	public static function addItem2CartSP($data)
	{
		DB::update("SET NOCOUNT ON; exec Cart_AddItem ?,?,?", $data);
	}

	public static function addCatalogItemSP($data)
	{
		DB::update("SET NOCOUNT ON; exec Catalog_AddItem ?,?,?,?", $data);
	}

	public static function getProductPrice($productId)
	{
		$data = DB::table('catalog')
			->select('price')
			->where('pid', $productId)
			->first();
		return isset($data) ? round($data->price, 2) : 0;
	}

	public static function getCatalogItem($productId)
	{
		return DB::table('catalog')
			->where('pid', $productId)
			->first();
	}
}