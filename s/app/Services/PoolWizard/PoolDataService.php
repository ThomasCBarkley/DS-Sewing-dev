<?php

namespace App\Services\PoolWizard;

use App\Helpers\PlotDB;
use App\Helpers\DsDB;
//use COM;

class PoolDataService
{
	protected $sessionID;

	public function __construct($sessionID)
	{
		$this->sessionID = $sessionID;
	}

	public function getFinishData(array $data)
	{
		$points = PlotDB::getPlotABDistance($data['plotId']);

		$pointCount = count($points);

		$width = ($data['width'] + 24) / 12;
		$height = ($data['height'] + 24) / 12;		

		$dsqFeet = $width * $height;
		$weight = $dsqFeet / 9 * 0.375;

		if ($pointCount > 125)
            $price = $dsqFeet * DsDb::getProductPrice('PL005');
        elseif ($pointCount > 100)
            $price = $dsqFeet * DsDb::getProductPrice('PL004');
        elseif ($pointCount > 75)
            $price = $dsqFeet * DsDb::getProductPrice('PL003');
        elseif ($pointCount > 55)
            $price = $dsqFeet * DsDb::getProductPrice('PL002');
        elseif ($pointCount > 35)
            $price = $dsqFeet * DsDb::getProductPrice('PL001');
        else
            $price = $dsqFeet * DsDb::getProductPrice('PL000');

		$result = [];
		$items = ['PLA001', 'PLA002', 'PLA003', 'PLA004', 'PLA005', 'PLS001', 'PLS002', 'PLS003', 'PLCA002', 'PLCA005', 'PLCA003', 'PLCA004'];

		foreach ($items as $item) {
			$result['price'.$item] = DsDb::getProductPrice($item);
		}

		$threeFeets = 2 + 2 * (round(($height / 3)) + round(($width / 3)));

		return array_merge($result, [
				'coverPrice' => round($price, 2),
				'WEBBING' => round(($width * round($width / 3)) + ($height * round($height / 3))),
				'lblDimension' => round($width) . 'x' . round($height),
				'lblThreeFeets' => $threeFeets,
				'coverImage' => '/pool/wizard/images/'.$data['plotId'].'.small.png',
				'width' => $width,
				'height' => $height,
				'weight' => $weight,
			]);
	}

	public function getPlotData($plotId)
	{
		return PlotDB::getPlot($plotId);
	}

	public function getStepData($plotId)
	{
		$plot = $this->getPlotData($plotId);
		$plotRefDist = $plot->referencedistance;
		$data = [
			'plotId' => $plotId,
			'name' => $plot->name,
			'phone' => $plot->phone,
			'email' => $plot->email,
			'referencedistance' => getFeet($plotRefDist) . ' feet ' . getInch($plotRefDist) . ' inches',
		];
		$data['plotABDistance'] = $this->normalizePlotABDistance(PlotDB::getPlotABDistance($plotId));
		$data['crossPoints'] = $this->normalizeCrossPoints(PlotDB::getCrossPoints($plotId));
		$data['perimPoints'] = $this->normalizeCrossPoints(PlotDB::getPerimPoints($plotId));
		return $data;
	}

	public function fillTables($plotId)
	{
		$plot = PlotDB::getPlot($plotId);

		for($i = 1; $i <= $plot->pointcount; $i++ ) {
			PlotDB::updateABPoint([
				$plotId, $i, 0, 0
			]);
		}
		for($i = 1; $i <= $plot->crosscount; $i++ ) {
			PlotDB::updateCross([
				$plotId, 0, 0, 0, $i
			]);
		}
		for($i = 1; $i <= $plot->perimcount; $i++ ) {
			PlotDB::updatePerim([
				$plotId, 0, 0, 0, $i
			]);
		}
	}

	private function normalizePlotABDistance($data)
	{
		$result = [];
		foreach ($data as $item) {
			$item->adistFeet = getFeet($item->adist);
			$item->adistInch = getInch($item->adist);
			$item->bdistFeet = getFeet($item->bdist);
			$item->bdistInch = getInch($item->bdist);
			$result[] = $item;
		}
		return $data;
	}

	private function normalizeCrossPoints($data)
	{
		$result = [];
		foreach ($data as $item) {
			$item->crossdistanceFeet = getFeet($item->crossdistance);
			$item->crossdistanceInch = getInch($item->crossdistance);
			$result[] = $item;
		}
		return $data;
	}

	public function updatePlotData($data)
	{
		if (isset($data->plotABDistance) && !empty($data->plotABDistance)) {
			foreach ($data->plotABDistance as $item) {
				PlotDB::updateABPoint([
					$item->plotid,
					$item->plotindex,
					$item->adistFeet*12+$item->adistInch,
					$item->bdistFeet*12+$item->bdistInch,
				]);
			}
		}

		if (isset($data->plotCrossDistance) && !empty($data->plotCrossDistance)) {
			foreach ($data->plotCrossDistance as $item) {
				PlotDB::updateCross([
					$item->plotid,
					$item->fromindex,
					$item->toindex,
					$item->crossdistanceFeet*12+$item->crossdistanceInch,
					$item->plotindex,
				]);
			}
		}

		if (isset($data->plotPerimDistance) && !empty($data->plotPerimDistance)) {
			foreach ($data->plotPerimDistance as $item) {
				PlotDB::updatePerim([
					$item->plotid,
					$item->fromindex,
					$item->toindex,
					$item->crossdistanceFeet*12+$item->crossdistanceInch,
					$item->plotindex,
				]);
			}
		}
	}
}