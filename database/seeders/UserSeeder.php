<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User;
use Spatie\Permission\Models\Role;



class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
			'number_id' => '123456789',
			'name' => 'Alejandro',
			'last_name' => 'Borja',
			'email' => 'mercadito1105@gmail.com',
			'password' => 123456789,
			'remember_token' => Str::random(10),
		]);

    }
}
