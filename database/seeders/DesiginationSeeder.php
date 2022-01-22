<?php

namespace Database\Seeders;

use App\Models\Desigination;
use Illuminate\Database\Seeder;

class DesiginationSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Desigination::create(['name' => 'HR Management',]);
		Desigination::create(['name' => 'Finance Admin']);
		Desigination::create(['name' => 'IT Admin']);
		Desigination::create(['name' => 'Full Stack Developer']);
		Desigination::create(['name' => 'Full Stack Developer & Tech Support']);
		Desigination::create(['name' => 'Flutter Developer']);
		Desigination::create(['name' => 'Quality Analyst']);
		Desigination::create(['name' => 'Marketing/Sales']);
		Desigination::create(['name' => 'DevOps & S/W Developer']);
		Desigination::create(['name' => 'Product Manager']);
		Desigination::create(['name' => 'Project Manager']);
		Desigination::create(['name' => 'UI/UX Developer']);
		Desigination::create(['name' => 'Front End Developer']);
		Desigination::create(['name' => 'Founder']);
		Desigination::create(['name' => 'Co-Founder']);
		Desigination::create(['name' => 'Others']);
	}
}
