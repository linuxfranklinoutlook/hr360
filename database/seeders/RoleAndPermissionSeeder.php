<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$admin=Role::create(['name' => 'Admin']);
		Role::create(['name' => 'HR']);
		Role::create(['name' => 'Project Manager']);
		Role::create(['name'=>'User']);
		// $me = User::find(1);

		// dd($me);
		//  $me->assignRole($admin);

		//  $benjamin = User::where('name','Benjamin');
		//  $benjamin->assignRole($admin);
    }
}
