<?php

namespace App\Helpers;

use Twilio\Rest\Client;

class Mensajeria
{
	public static function sendSMS()
	{
		$account_sid = ENV("TWILIO_SID");
        $auth_token = ENV("TWILIO_AUTH_TOKEN");
        $twilio_number = ENV("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        return ['cliente' => $client, 'numero' => $twilio_number];
	}
}