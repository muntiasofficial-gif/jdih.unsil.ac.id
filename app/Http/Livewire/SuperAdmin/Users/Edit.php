<?php

namespace App\Http\Livewire\SuperAdmin\Users;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $user_id;
    use AttributeUser;
    public $listeners = [
        'editUser'
    ];

    public function editUser($user_id)
    {
        $user = User::findOrFail($user_id);
        $this->user_id = $user_id;
        $this->add = true;
    }
    public function render()
    {
        return view('livewire.super-admin.users.edit');
    }
}
