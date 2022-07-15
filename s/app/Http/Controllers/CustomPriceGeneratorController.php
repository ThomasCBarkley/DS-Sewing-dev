<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\DsDB;

use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Crypt;

class CustomPriceGeneratorController extends Controller
{
	public function getIndex()
	{
		return Response::view('custom_price_generator.index');
	}

	public function postPidgen(Request $request)
	{
		$vWidth = $request->txtWidthFt + $request->txtWidthIn / 12;
		$vLength=  $request->txtLenFt + $request->txtLenIn / 12;
		$vShape = $request->txtShape;


		if ($vShape == 2) {
			$vWidth = $request->txtDiameterFt + $request->txtDiameterIn / 12;
			$vLength = $vWidth;
		}

		if ($vShape > 0 and $vWidth > 0 and $vLength > 0) {
			$data = DsDB::getFabricSizeToPid([
				$request->txtFabric,	//'txtFabric'
				$vLength,				//'vLength'
				$vWidth,				//'vWidth'
				$request->txtColour,	//'txtColour'
				$vShape					//'vShape'
			]);

			if ($data) {
				return Response::view('custom_price_generator.result', ['data' => $data]);
			}
		}
		//TODO return error
	}

	public function postPidgenDepth(Request $request)
	{
		$vWidth = $request->txtWidthFt + $request->txtWidthIn / 12;
		$vLength=  $request->txtLenFt + $request->txtLenIn / 12;
		$vHeight=  $request->txtHeightFt + $request->txtHeightFt / 12;
		$vShape = $request->txtShape;


		if ($vShape == 2 || $vShape == 4) {
			$vWidth = $request->txtDiameterFt + $request->txtDiameterIn / 12;
			$vLength = $vWidth;
		}

		if ($vShape > 0 and $vWidth > 0 and $vLength > 0) {
			$data = DsDB::getFabricSizeToPid2([
				$request->txtFabric,	//'txtFabric'
				$vLength,				//'vLength'
				$vWidth,				//'vWidth'
				$vHeight,				//'vHeight'
				$request->txtColour,	//'txtColour'
				$vShape					//'vShape'
			]);
		}
		if ($data) {
			return Response::view('custom_price_generator.result', ['data' => $data]);
		}
		//TODO return error
	}
}
