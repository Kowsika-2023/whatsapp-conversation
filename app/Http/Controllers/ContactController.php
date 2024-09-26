<?php

namespace App\Http\Controllers;
use App\Services\TwilioService;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|email',
        ]);

        $message = "Name: {$request->name}\nMobile: {$request->mobile}\nEmail: {$request->email}";

        $to = '+916380041683'; //the user send the message...
        // $to = '+91'.$request->mobile; //admin
        // Send the message
        $this->twilio->sendWhatsAppMessage($to, $message);

        return back()->with('success', 'Message sent successfully!');
    }
}
