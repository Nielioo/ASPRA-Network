<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $tableSearch = '';

    public function render()
    {
        if ($this->tableSearch == '') {
            $users = User::latest()->paginate(20);
        } else {
            $users = User::where('name', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('uname', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('email', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('phone_number', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('position', 'like', '%' . $this->tableSearch . '%')
                ->latest()
                ->paginate(10);
        }
        return view('livewire.user.user-table', ['users' => $users]);
    }
}
