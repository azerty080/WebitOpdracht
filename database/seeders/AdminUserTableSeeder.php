<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
				'firstname' => 'Admin',
				'lastname' => 'Van Administror',
				'email' => env('ADMIN_EMAIL'),
				'township' => 'Antwerpen',
				'address' => 'Antwerpenlei 5',
				'role' => 'admin',
				'password' => Hash::make(env('ADMIN_PASSWORD'))
		]);
    }
}
