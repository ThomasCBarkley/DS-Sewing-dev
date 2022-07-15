<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Helpers\DsDB;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected $sessionID;
	protected $encryptedSessionID;

	public function __construct(Request $request)
	{
		if (!$request->session()->exists(('sessionId'))) {
			$this->setSessionID($request);
		} else {
			$this->sessionID = $request->session()->get('sessionId');
		}
	}

	protected function setSessionID(Request $request)
	{
		$this->sessionID = DsDB::getNewSessionID([
			'referer' => $request->headers->get('referer'),
			'remote_addr' => $request->ip(),
			'user_agent' => $request->header('user-agent'),
		]);
		session(['sessionID' => $this->sessionID]);
		$request->session()->put('sessionId', $this->sessionID);
	}

}
