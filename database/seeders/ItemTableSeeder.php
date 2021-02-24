<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
			[
				'title' => 'title',
				'description' => 'description'
			],
			[
				'title' => 'title',
				'description' => 'description'
			],
			[
				'title' => 'title',
				'description' => 'description'
			],
			[
				'title' => 'title',
				'description' => 'description'
			],
			[
				'title' => 'title',
				'description' => 'description'
			],
		]);
    }
}
