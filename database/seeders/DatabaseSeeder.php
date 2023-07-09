<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);

        DB::table('settings')->insert([
            'title' =>  'Horta à Porta',
            'meta_description'  =>  'Horta à Porta',
            'meta_keywords'     =>  'Horta à Porta',
            'contact_email'     =>  'hortaaporta@gmail.com',
            'facebook_link'     =>  'https://www.facebook.com/hortaaportafrescos',
            'instagram_link'    =>  'https://www.instagram.com/horta_a_porta/',
        ]);
    }
}
