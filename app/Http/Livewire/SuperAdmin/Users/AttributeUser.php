<?php


namespace App\Http\Livewire\SuperAdmin\Users;


trait AttributeUser
{
    public $role, $password, $password_confirmation, $name, $email;

    public function mountAttribute()
    {

        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = implode(',',$user->roles->pluck('name')->toArray());

    }

}
