<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

// https://nanonets.com/blog/use-whatsapp-api-to-send-messages/

class WhatsAppController extends Controller
{
    public function sendMessage()
    {
        $client = new Client();
        $token = 'Bearer EAANKo9YdU28BO6TUMN4FlJTUmvYtRB2Ws6fhdjFlBtVTzTSO9jt5DXP54hOlCT2gEK6jXhNJoIqDWFXzkHce7rDj83sj3hk1ZCkbwZB6AUlRUZCzNV2GUpkhJmvSC6oVESgujZBYPbbrXpot4XQJxaZA9KDuy2yzSx4IjreZCZACpL12CWQNknEoZBVr5P6cL5Mb';

        $response = $client->post('https://graph.facebook.com/v19.0/260819393788777/messages', [
            'headers' => [
                'Authorization' => $token,
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'messaging_product' => 'whatsapp',
                'recipient_type' => 'individual',
                'to' => '6285105118880',

                'type' => 'template',
                'template' => [
                    'name' => 'production_reject_notifications',
                    'language' => [
                        'code' => 'en_US'
                    ],
                    'components' => [
                        [
                            'type' =>'body',
                            'parameters' => [
                                [
                                    'type' => 'text',
                                    'text' => 'PRODUCT_NAME'
                                ],
                                [
                                    'type' => 'text',
                                    'text' => 'REJECT_PERCENTAGE'
                                ],
                                [
                                    'type' => 'text',
                                    'text' => 'DATE SHIFT'
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);

        return back();
    }
}
