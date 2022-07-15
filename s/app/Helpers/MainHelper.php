<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

function getFeet($value) {
	return floor($value / 12);
}

function getInch($value) {
	return round(fmod($value, 12) ,2);
}

/**
 * Return a formatted Carbon date.
 */
function humanize_date(string $date, string $format = 'd F Y, H:i'): string
{
    return Carbon::parse($date)->format($format);
}

function dsSendMail($template, $data, $to, $subject)
{
    try {
        Mail::send($template, $data, function ($m) use ($to, $subject) {
            $m->to($to)->subject($subject)->replyTo(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
    } catch(\Swift_TransportException $e) {

    }
}