<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Http\Requests\Forms\CatalogRequestRequest;
use App\Models\CatalogRequests;

class ReferController extends \Illuminate\Routing\Controller
{
    /**
     * Show the form.
     */
    public function index(): View
    {
        return view('forms.refer', ['form' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function submit()
    {
        $validated = Validator::make(request()->all(), [
            'yourEmail' => 'required|email:dns',
            'friendEmail' => 'required|email:dns',
        ],$messages = [
            'required' => 'The :attribute field is required.',
            'email' => 'Please enter a valid Email address.',
        ])->validate();

        dsSendMail('emails.refer', [], $validated['friendEmail'], 'D.S. Sewing, inc. Contract Sewing');

        return redirect()->to('s/refer/success');
    }

    /**
     * Show the form.
     */
    public function success(): View
    {
        return view('forms.refer');
    }

}
