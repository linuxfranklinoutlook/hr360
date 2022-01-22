<?php

namespace Database\Seeders;

use App\Models\HelperState;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$states = config('states');

		foreach ($states as $state => $cities) {
			# code...
			HelperState::create(['name' => $state, 'cities_array' => json_encode($cities)]);
		}
    }
}
