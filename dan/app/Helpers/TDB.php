<?php

namespace App\Helpers;

use DB;

class TDB
{
	public static function getCatalog()
	{
		return DB::table('catalog')->get();
	}

	public static function updateCatalog($data)
	{
		DB::table('catalog')
			->where('pid', $data->pid)
			->update(['length' => $data->length, 'width' => $data->width, 'height' => $data->height]);
	}

}