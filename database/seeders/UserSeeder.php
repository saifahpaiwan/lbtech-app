<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{ 
    public function run()
    {
        DB::table('users')->insert([
            'name'  => "Saifah Phaiwan",
            'email' => "saifah1929@gmail.com",
            'password' => Hash::make('P@ssword'),
        ]);
    }
}
