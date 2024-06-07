<?php

namespace App\Http\Livewire\Oi;

use App\Models\Oi;
use App\Models\User;
use GuzzleHttp\Client;
use Livewire\Component;

class OiWhatsappNotification extends Component
{
    public $oi;

    public $userQuery;
    public $users;
    public $selectedUser;

    public function mount(Oi $oi)
    {
        $this->oi = $oi;
    }

    public function updatedUser($value)
    {
        // Find the selected User
        $user = User::find($value);

        $this->selectedUser = $user;
    }

    public function updateSelectedUser($userId)
    {
        $selectedUser = User::find($userId);

        if ($selectedUser) {
            $this->selectedUser = $selectedUser;
            $this->resetVars();
        }
    }

    public function updatedUserQuery()
    {
        sleep(0.5);
        $this->users = User::where('name', 'like', '%' . $this->userQuery . '%')
            ->orWhere('uname', 'like', '%' . $this->userQuery . '%')
            ->orWhere('phone_number', 'like', '%' . $this->userQuery . '%')
            ->orWhere('email', 'like', '%' . $this->userQuery . '%')
            ->orWhere('position', 'like', '%' . $this->userQuery . '%')
            ->get()->toArray();
    }

    public function resetVars()
    {
        $this->userQuery = '';
        $this->users = [];
    }

    public function notify()
    {
        $phone_number = $this->selectedUser->phone_number;

        $this->sendMessage($phone_number);

        session()->flash('message', 'Message already send!');
    }

    public function sendMessage($phone_number)
    {
        $client = new Client();
        $token = 'Bearer EAANKo9YdU28BO6TUMN4FlJTUmvYtRB2Ws6fhdjFlBtVTzTSO9jt5DXP54hOlCT2gEK6jXhNJoIqDWFXzkHce7rDj83sj3hk1ZCkbwZB6AUlRUZCzNV2GUpkhJmvSC6oVESgujZBYPbbrXpot4XQJxaZA9KDuy2yzSx4IjreZCZACpL12CWQNknEoZBVr5P6cL5Mb';
        $phone_numbers = [$phone_number];

        $message = 'dapat melakukan pengecekan OI dengan kode *' . $this->oi->oi_code . '* ';

        foreach($phone_numbers as $phone_number){
            $response = $client->post('https://graph.facebook.com/v19.0/260819393788777/messages', [
                'headers' => [
                    'Authorization' => $token,
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    'messaging_product' => 'whatsapp',
                    'recipient_type' => 'individual',
                    'to' => $phone_number,

                    'type' => 'template',
                    'template' => [
                        'name' => 'oi_verification_notifications',
                        'language' => [
                            'code' => 'en_US'
                        ],
                        'components' => [
                            [
                                'type' =>'body',
                                'parameters' => [
                                    [
                                        'type' => 'text',
                                        'text' => $message,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]);
        }

        return back();
    }

    public function render()
    {
        return view('livewire.oi.oi-whatsapp-notification');
    }
}
