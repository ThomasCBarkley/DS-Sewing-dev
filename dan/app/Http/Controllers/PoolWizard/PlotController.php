<?php

namespace App\Http\Controllers\PoolWizard;

use App\Http\Controllers\Controller;

use App\Services\PoolWizard\PoolDataService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class PlotController extends Controller
{
	protected $service;

	public function __construct(Request $request) {
		parent::__construct($request);
		$this->service = new PoolDataService($this->sessionID);
	}

	public function getIndex()
	{
		if (!session('plotID')) {
			return response()->redirectTo('/dan/pool/');
		}
		return Response::view('pool_wizard.plot', ['plotID' => session('plotID')]);
	}

	public function getData(Request $request)
	{
		$plotId = $request->session()->get('plotID');
		$data = $this->service->getStepData($plotId);

		return response()->json($data);
	}

	public function postStorePlot(Request $request)
	{
		$data = json_decode($request->getContent());
		$this->service->updatePlotData($data);
	}

	public function getCover(Request $request)
	{
		$plotId = $request->session()->get('plotID');
		$plotData = $this->service->getPlotData($plotId);

		$client = new \GuzzleHttp\Client(['verify' => false]);
		$data = "plot_id=".$plotId."&point_count=".$plotData->pointcount."&session_id=".$this->sessionID . "&ref_dist=" . $plotData->referencedistance;
		$req = $client->get('https://www.ds-sewing.com/pool/wizard/step3.aspx?'. $data);
		$response = json_decode($req->getBody());

		$request->session()->put('plot_width', $response->width);
		$request->session()->put('plot_height', $response->height);
    
		return response()->json(['image' => '/pool/wizard/images/'.$plotId.'.png']);
	}
}
