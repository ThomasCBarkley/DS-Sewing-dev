<?php

namespace App\Http\Controllers\Forms;

use App\Helpers\DsDB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Forms\CatalogRequestRequest;
use App\Models\CatalogRequests;

class CatalogRequestController extends \Illuminate\Routing\Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        return view('forms.request');
    }

    /**
     * Display the specified resource.
     */
    public function submit(CatalogRequestRequest $request): View
    {
        $record = new CatalogRequests($request->except('_token'));
        $record->save();
        return view('forms.thanks');
    }
}
