<?php

namespace App\Http\Livewire\SuperAdmin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Add extends Component
{
    use AttributeUser;
    public $add = false;
    public $rules = [
        'role' => 'required',
        'email' => 'required|email|unique:users',
        'name' => 'required',
        'password' => 'confirmed|required',
    ];

    public function save()
    {
        $data = $this->validate();
        $prepare = [
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
        ];
        $user = User::create($prepare);
        $user->assignRole(explode(',', $data['role']));
        $this->add = false;
        $this->emit('alert', ['tipe' => 'success', 'body' => 'User : <b>' . $user->name . '</b> berhasil ditambahkan']);
        $this->emitUp('refresh');
    }

    public function render()
    {
        return view('livewire.super-admin.users.add');
    }
}
