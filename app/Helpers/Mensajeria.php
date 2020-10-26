<?php

namespace App\Helpers;

use Twilio\Rest\Client;

class Mensajeria
{
	public static function sendSMS()
	{
		$account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        return ['cliente' => $client, 'numero' => $twilio_number];
	}
}