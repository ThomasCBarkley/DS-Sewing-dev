<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

use App\Helpers\DsDB;
use App\Services\PoolWizard\PoolDataService;

class PoolWizardFinish extends Component
{
	public $plotId;
	public $coverImage;
	public $coverPrice;
	public $lblDimension;
	public $lblPrice;
	public $COVER = 1;
	public $pricePLA005;
	public $WEBBING;
	public $lblThreeFeets;
	public $pricePLA001;
	public $pricePLA002;
	public $pricePLA003;
	public $pricePLA004;
	public $pricePLS001;
	public $pricePLS002;
	public $pricePLS003;
	public $pricePLCA002;
	public $pricePLCA005;
	public $pricePLCA003;
	public $pricePLCA004;
	public $width;
	public $height;
	public $weight;

	public $BAC = 0;
	public $BAWD = 0;
	public $SPUA = 0;
	public $LS = 0;
	public $SPRING = 0;
	public $SSPRING = 0;
	public $SPRCOVER = 0;
	public $STRAP = 0;
	public $REINSTRIP = 0;
	public $TAMP = 0;
	public $LEVER = 0;

    /**
     * @param Request $request
     */
    public function mount(Request $request){
		$sessionId = $request->session()->get('sessionId');
		$this->plotId = $request->session()->get('plotID');

		$service = new PoolDataService($sessionId);
		$data = $service->getFinishData([
			'plotId' => $this->plotId,
			'width' => $request->session()->get('plot_width'),
			'height' => $request->session()->get('plot_height'),
			'weight' => $request->session()->get('plot_weight'),
	    ]);

		$this->assignData($data);
	}

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.pool-wizard-finish');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function submit(Request $request)
	{
		if (!$sessionId = $request->session()->get('sessionId')) {
			return; //TODO error
		}

		$this->addToCart($sessionId, 'PLA001', $this->BAC); // concrete anchor
		$this->addToCart($sessionId, 'PLA002', $this->BAWD); // deck anchor
		$this->addToCart($sessionId, 'PLA003', $this->SPUA); // popup anchor
		$this->addToCart($sessionId, 'PLA004', $this->LS); // lawn stake

		$this->addToCart($sessionId, 'PLS001', $this->SPRING); // long spring
		$this->addToCart($sessionId, 'PLS002', $this->SSPRING); // short spring
		$this->addToCart($sessionId, 'PLS003', $this->SPRCOVER); // spring cover

		$this->addToCart($sessionId, 'PLCA002', $this->STRAP); // buckle strap
		$this->addToCart($sessionId, 'PLCA005', $this->REINSTRIP); // reinforcment strap
		$this->addToCart($sessionId, 'PLCA003', $this->TAMP); // tamping tool
		$this->addToCart($sessionId, 'PLCA004', $this->LEVER); // installation lever tool

		$this->addToCart($sessionId, 'PLA005', $this->WEBBING); // webbing

		DsDB::addCatalogItemSP(['PCP'.$sessionId, $this->coverPrice, $this->weight, $this->lblDimension . ' custom pool cover.']);
		$this->addToCart($sessionId, 'PCP'.$sessionId, $this->COVER);

		return redirect()->to('/dan/tinycart');
    }

    /**
     * @param $sessionId
     * @param $pid
     * @param $qty
     */
    private function addToCart($sessionId, $pid, $qty)
	{
		if (!$qty) return;

		DsDB::addItem2CartSP([$sessionId, $pid, $qty]);
	}

    /**
     * @param array $data
     */
    private function assignData($data)
	{
		foreach ($data as $key => $item) {
			if (property_exists($this, $key))
				$this->{$key} = $item;
		}
    }
}
