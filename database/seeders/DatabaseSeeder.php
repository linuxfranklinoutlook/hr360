<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use App\Models\Asset;
use App\Models\Attendance;
use App\Models\Task;
use App\Models\Desigination;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
		$this->call([
			
			RoleAndPermissionSeeder::class,
			UserSeeder::class,
			StateSeeder::class,
			CourseSeeder::class,
			
			EmployeeSeeder::class,
			AssetSeeder::class,
            ProjectSeeder::class,
            ClientSeeder::class,
            TaskSeeder::class,
			DesiginationSeeder::class,
			
            // Attendance::class,
		]);
    }
}
