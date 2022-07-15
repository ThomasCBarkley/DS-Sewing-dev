<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Helpers\DsDB;
use DB;

class UpdateItemsFromFile extends Controller
{
    public function index(Request $request)
    {
        $request->session()->put('update_products_line', 0);
        return Response::view('admin.updateitems.index');
    }

    public function getLine(Request $request)
    {
        $lineNum = $request->session()->get('update_products_line');

        $fileData = $this->parseLine($lineNum);
        $dbData = $this->getDbLine($fileData['pid']);

        $request->session()->put('update_products_line', $lineNum+1);
        return Response::view('admin.updateitems.line', [
            'fileData' => $fileData,
            'dbData' => $dbData
        ]);
    }

    public function storeLine(Request $request)
    {
        $data = $request->except('_token');
        $pid = $data['pid'];

        $dbData = DsDB::getCatalogItem($pid);
        if (!$dbData) {
            $sql = "insert catalog (pid,price,weight,[description],[image],dateadded, [height], [width], [length]) 
                values ('" . $data['pid'] . "',0," . $data['weight'] . ",'',null,getdate()," . $data['height'] . "," . $data['width'] . "," . $data['length'] . ")";
            DB::insert($sql);
        } else {
            unset($data['pid']);
            $sql = 'UPDATE catalog SET ' . implode("=?, ", array_keys($data)) . "=? WHERE pid=?";
            $data[] = $pid;
            DB::update($sql, array_values($data));
        }
    }

    private function parseLine($lineNum)
    {
        $file = file('../storage/data.csv');
        $line =  $file[$lineNum];

        $rawAr = explode(';', $line);
        $size = explode('X', $rawAr[1]);

        return [
            'pid' => $rawAr[0],
            'height' => $size[0],
            'width' => $size[1],
            'length' => $size[2],
            'weight' => str_replace('LBS', '', $rawAr[2]),
        ];
    }

    private function getDbLine($pid)
    {
        $dbData = DsDB::getCatalogItem($pid);

        if (!$dbData) {
            $dbData = [
                'pid' => $pid,
                'height' => 0,
                'width' => 0,
                'length' => 0,
                'weight' => 0,
            ];
        } else {
            $dbData = [
                'pid' => $pid,
                'height' => $dbData->height,
                'width' => $dbData->width,
                'length' => $dbData->length,
                'weight' => $dbData->weight,
            ];
        }

        return $dbData;
    }
}
