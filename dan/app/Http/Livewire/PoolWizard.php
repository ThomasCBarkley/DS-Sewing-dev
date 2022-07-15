<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Helpers\PlotDB;
use App\Services\PoolWizard\PoolDataService;

class PoolWizard extends Component
{
	public $currentStep = 0;
	public $NewOrOld = 0;
	public $txtPlotID;

	public  $txtPointCount;
	public  $txtDistanceFeet;
	public  $txtDistanceInches;
	public  $txtCrossCount;
	public  $txtPerimCount;
	public  $txtName;
	public  $txtPhone;
	public  $txtEmail;

	public function render()
    {
        return view('livewire.pool-wizard');
    }

    public function submitStep0(Request $request)
	{
		$rules = [
			'txtPlotID' => 'required|integer|between:100000,500000',
		];

		$messages = [
			'txtPlotID.required' => 'You must specify a pool id.',
			'txtPlotID.between' => 'Pool cover ID must be between 100000 and 500000.',
			'txtPlotID.integer' => 'Pool cover ID must be between 100000 and 500000.',
		];

		if ($this->NewOrOld == 1) {
			$this->validate($rules, $messages);
			$request->session()->put('plotID', $this->txtPlotID);
			return redirect()->to('/dan/pool/plot');
		}
		$this->currentStep = 1;
	}

	public function submitStep1(Request $request)
	{
		$rules = [
			'txtPointCount' => 'required|integer|between:4,100',
			'txtCrossCount' => 'nullable|integer|between:1,5',
			'txtPerimCount' => 'nullable|integer|between:1,5',
			'txtName' => 'required',
			'txtPhone' => 'required',
			'txtEmail' => 'required|email',
		];

		$messages = [
			'txtPointCount.required' => 'The A/B point count must be between 4 and 100.',
			'txtPointCount.integer' => 'The A/B point count must be between 4 and 100.',
			'txtPointCount.between' => 'The A/B point count must be between 4 and 100.',
			'txtCrossCount.between' => 'Maximum of 5 cross points allowed.',
			'txtPerimCount.between' => 'Maximum of 5 perimeter points allowed.',
			'txtName.required' => 'Name is required.',
			'txtPhone.required' => 'Phone is required.',
			'txtEmail.required' => 'Email is required.',
			'txtEmail.email' => 'Email is required.',
		];
		$this->validate($rules, $messages);

		$plotId = PlotDB::plotAddNew([
			$this->txtName,
			$this->txtPhone,
			$this->txtEmail,
			$this->txtDistanceFeet * 12 + $this->txtDistanceInches,
			$this->txtPointCount != '' ? $this->txtPointCount : 0,
			$this->txtCrossCount != '' ? $this->txtCrossCount : 0,
			$this->txtPerimCount != '' ? $this->txtPerimCount : 0,
		]);

		$sessionId = $request->session()->get('sessionId');
		$service = new PoolDataService($sessionId);
		$service->fillTables($plotId);

		$request->session()->put('plotID', $plotId);
		return redirect()->to('/dan/pool/plot');
	}

}
