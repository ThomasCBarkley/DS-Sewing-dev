<?php

namespace App\Http\Controllers\PoolWizard;

use App\Http\Controllers\Controller;

use App\Services\PoolWizard\PoolDataService;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Helpers\DsDB;
use App\Helpers\PlotDB;

use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Response;


class IndexController extends Controller
{
	protected $service;

	public function __construct(Request $request) {
		parent::__construct($request);
		$this->service = new PoolDataService($this->sessionID);
	}

	public function getIndex(Request $request)
	{
		return Response::view('pool_wizard.index');
	}

	public function getFinish(Request $request)
	{
		if (!$plotId = $request->session()->get('plotID')) {
			return redirect()->to('/s/pool/plot');
		}
		$this->service->getFinishData([
			'plotId' => $plotId,
			'width' => $request->session()->get('plot_width'),
			'height' => $request->session()->get('plot_height'),
			]);
		return Response::view('pool_wizard.finish');
	}

	public function postIndex(Request $request)
	{
		return $this->getStep(0, $request);
	}

	public function getStep($id, Request $request)
	{
		if (!$plotId = session('plotID')) {
			return redirect('/s/pool');
		}
		$step2Data = $this->service->getStepData($plotId);

		$data = [
			'nextStepUrl' => '/s/pool/'.($id+1),
			'currentStep' => $id,
			'stepData' => $step2Data,
		];
		session('plotID', $plotId);
		return Response::view('pool_wizard.index', $data);
	}

	private function error($stepId, $message)
	{
	}
}
