<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function sendMessage(Request $request)
    {
        $client = new Client();

        $response = $client->post('https://graph.facebook.com/v19.0/260819393788777/messages', [
            'headers' => [
                'Authorization' => 'Bearer EAANKo9YdU28BO4LH3DpGPCUqTO2HjbCmV2FRYxjzMqHCMESNfAaUuTqU125FsxYUWBbFLGcxxPlQpJHXxGLHEenoZAcBEUZBn8ZA6xVivnjFeSjU4FdNb2JjflN9ltxPJEjHs66LmYZA31PJsZAaQdiJ3UNlQFfMR01SSINgtwLkdtwDAZBkvLUz4j16m5qlVwtxd5rFZCBJCIRaZAMtiycZD',
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'messaging_product' => 'whatsapp',
                'to' => '6285105118880',
                'type' => 'template',
                'template' => [
                    'name' => 'hello_world',
                    'language' => [
                        'code' => 'en_US'
                    ],
                ]
            ]
        ]);

        return back();
    }
}
