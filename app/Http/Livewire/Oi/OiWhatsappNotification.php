<?php

namespace App\Http\Livewire\Oi;

use App\Models\Oi;
use App\Models\User;
use App\Models\Verification;
use GuzzleHttp\Client;
use Livewire\Component;

class OiWhatsappNotification extends Component
{
    public $oi;

    public $userQuery;
    public $users;
    public $selectedUser;

    protected $listeners = ['triggerConfirm' => 'confirmWhatsappNotification'];

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
        // Define the position levels
        $positionLevels = [
            'Marketing' => 1,
            'Supervisor Marketing' => 2,
            'Manager' => 3,
            'Director' => 4,
            'Supervisor PPIC' => 5,
        ];

        // Get the current user's position level
        $currentUserPositionLevel = $positionLevels[auth()->user()->position];
        $currentUserId = auth()->user()->id; // Get the current user's id

        sleep(0.5);
        $this->users = User::where(function ($query) use ($positionLevels, $currentUserPositionLevel) {
            foreach ($positionLevels as $position => $level) {
                if ($currentUserPositionLevel < $level) { // Change <= to < to exclude same level
                    $query->orWhere('position', 'like', '%' . $position . '%');
                }
            }
        })
        ->where('id', '!=', $currentUserId) // Exclude the current user
        ->where(function ($query) {
            $query->where('name', 'like', '%' . $this->userQuery . '%')
                ->orWhere('uname', 'like', '%' . $this->userQuery . '%')
                ->orWhere('phone_number', 'like', '%' . $this->userQuery . '%')
                ->orWhere('email', 'like', '%' . $this->userQuery . '%')
                ->orWhere('position', 'like', '%' . $this->userQuery . '%');
        })
        ->get()->toArray();

    }

    public function resetVars()
    {
        $this->userQuery = '';
        $this->users = [];
    }

    public function waitingForApproval()
    {
        $verification = Verification::firstOrNew([
            'user_id' => $this->selectedUser->id,
            'oi_id' => $this->oi->id,
        ]);

        if (!$verification->exists) {
            // Only set the verifier_order if this is a new verification
            $verification->verifier_order = $this->oi->verifications()->count() + 1;
        }

        $verification->status = 'waiting_for_approval';
        $verification->save();

        $this->oi->current_verifier = $this->selectedUser->name;
        $this->oi->save();

        session()->flash('message', 'OI is Waiting for Approval!');
        return redirect()->route('ois.show', ['oi' => $this->oi->id]);
    }

    public function sendMessage($phone_number)
    {
        $client = new Client();
        $token = 'Bearer EAANKo9YdU28BO6TUMN4FlJTUmvYtRB2Ws6fhdjFlBtVTzTSO9jt5DXP54hOlCT2gEK6jXhNJoIqDWFXzkHce7rDj83sj3hk1ZCkbwZB6AUlRUZCzNV2GUpkhJmvSC6oVESgujZBYPbbrXpot4XQJxaZA9KDuy2yzSx4IjreZCZACpL12CWQNknEoZBVr5P6cL5Mb';
        $phone_numbers = [$phone_number];
        $message = 'dapat melakukan pengecekan OI dengan kode *' . $this->oi->oi_code . '* pada link berikut: ' . url('ois/' . $this->oi->id);

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

    public function notify()
    {
        $this->waitingForApproval();

        try {
            $this->sendMessage($this->selectedUser->phone_number);
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }

        session()->flash('message', 'Message already send!');
    }

    public function render()
    {
        return view('livewire.oi.oi-whatsapp-notification');
    }
}
