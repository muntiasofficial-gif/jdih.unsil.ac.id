<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AddRoleGeneral extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Role
        $general = Role::updateOrCreate(['name' => 'general', 'guard_name' => 'web']);
        //
        $user = \App\Models\User::updateOrCreate([
            'email' => 'general@gmail.com'], [
            'name' => 'General User',
            'email' => 'gseneral@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($general);
    }
}
