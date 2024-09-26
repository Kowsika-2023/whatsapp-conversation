<?php
// app/Services/TwilioService.php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendWhatsAppMessage($to, $message)
    {
        // $from = env('TWILIO_WHATSAPP_FROM');
        $from = '+916380041683';

        // $to = '+917358144801';
        $this->client->messages->create("whatsapp:$to", [
            'from' => $from,
            'body' => $message,
        ]);
    }

}
