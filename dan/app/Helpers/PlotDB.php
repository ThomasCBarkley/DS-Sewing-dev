<?php

namespace App\Helpers;

use DB;

class PlotDB
{
	public static function getPlot($plotId)
	{
		return DB::connection('netplot')
			->table('plot')
			->where('plotid', $plotId)
			->first();
	}

	public static function getPlotABDistance($plotId)
	{
		return DB::connection('netplot')
			->table('plotabdistance')
			->where('plotid', $plotId)
			->select()->orderby('plotindex')
			->get()->toArray();
	}

	public static function getCrossPoints($plotId)
	{
		return DB::connection('netplot')
			->table('plotcrossdistance')
			->where('plotid', $plotId)
			->select()->orderby('plotindex')
			->get()->toArray();
	}

	public static function getPerimPoints($plotId)
	{
		return DB::connection('netplot')
			->table('plotperimdistance')
			->where('plotid', $plotId)
			->select()->orderby('plotindex')
			->get()->toArray();
	}

	public static function plotAddNew($data)
	{
		DB::connection('netplot')
			->select("SET NOCOUNT ON; exec Plot_AddNew ?,?,?,?,?,?,?", $data);
		return DB::connection('netplot')->getPdo()->lastInsertId();
	}

	public static function updateABPoint($data)
	{
		DB::connection('netplot')
			->update("SET NOCOUNT ON;  exec Plot_UpdateABPoint ?,?,?,?", $data);
	}

	public static function updateCross($data)
	{
		DB::connection('netplot')
			->update("SET NOCOUNT ON;  exec Plot_UpdateCross ?,?,?,?,?", $data);
	}

	public static function updatePerim($data)
	{
		DB::connection('netplot')
			->update("SET NOCOUNT ON;  exec Plot_UpdatePerim ?,?,?,?,?", $data);
	}
}