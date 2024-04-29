<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

	public function run()
	{
		$user = new User([
			'number_id' => '123456789',
            'name' => 'Alejandro',
            'last_name' => 'Borja',
            'email' => 'mercadito1105@gmail.com',
            'password' => '123456789',
            'remember_token' => Str::random(10),
		]);
		$user->save();
		$user->assignRole('admin');
	}
}
