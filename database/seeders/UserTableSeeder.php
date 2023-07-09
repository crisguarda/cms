<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superadmin = Role::where('name', 'superadmin')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_editor = Role::where('name', 'editor')->first();

        $superadmin = new User();
        $superadmin->name = 'Superadmin';
        $superadmin->email = 'superadmin@hortaaporta.com';
        $superadmin->password = Hash::make('password');
        $superadmin->save();
        $superadmin->roles()->attach($role_superadmin);

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@hortaaporta.com';
        $admin->password = Hash::make('password');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $editor = new User();
        $editor->name = 'Editor';
        $editor->email = 'editor@hortaaporta.com';
        $editor->password = Hash::make('password');
        $editor->save();
        $editor->roles()->attach($role_editor);
    }
}
