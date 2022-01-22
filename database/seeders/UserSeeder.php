<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$me = User::create([
			'name' => 'Rohan Krishna',
			'email' => 'rohan.krishna@bluehexsoftware.com',
			'password' => bcrypt('password!23'),
			'role_id'=>'1',
		]);
		$ben = User::create([
			'name' => 'Benjamin',
			'email' => 'benjamin@bluehexsoftware.com',
			'password' => bcrypt('password'),
			'role_id'=>'1',
		]);
    }
}
