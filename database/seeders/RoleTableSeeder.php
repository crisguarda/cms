<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superadmin = new Role();
        $role_superadmin->name = "superadmin";
        $role_superadmin->description = "The full permition user";
        $role_superadmin->save();

        $role_admin = new Role();
        $role_admin->name = "admin";
        $role_admin->description = "The administration user";
        $role_admin->save();

        $role_editor = new Role();
        $role_editor->name = "editor";
        $role_editor->description = "The edition user";
        $role_editor->save();

        $role_front_user = new Role();
        $role_front_user->name = "client";
        $role_front_user->description = "The frontOffice registered user";
        $role_front_user->save();
    }
}
