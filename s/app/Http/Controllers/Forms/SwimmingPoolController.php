<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;

class SwimmingPoolController extends \Illuminate\Routing\Controller
{
    public function index()
    {
        return Response::view('forms.swimming-pool');
    }

    public function submit(Request $request)
    {
        $this->sendMail($request->all());
        return response()->json(['result' => 'success']);
    }

    private function sendMail($data)
    {
        try {
            Mail::send('emails.swimming-pool', $data, function ($m) {
                $m->to(env('MAIL_FROM_ADDRESS'))->subject('SWIMMING POOL COVER ORDER');
            });
        } catch(\Swift_TransportException $e) {
            //dd($e); TODO exception
        }
    }
}
