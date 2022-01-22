<?php

namespace Database\Factories;

use App\Models\SalaryStructure;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryStructureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalaryStructure::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
			//
			 'basic' => $this->faker->randomNumber(),
			 'hra' => $this->faker->randomNumber(),
			'ctc' => $this->faker->randomNumber(),
			'broadband' => $this->faker->randomNumber(),
			// 'other_allowances' => $this->faker->randomNumber(),
			// 'pf' => $this->faker->randomNumber(),
			// 'esi' => $this->faker->randomNumber(),
			'pt' => $this->faker->randomNumber(),
			// 'others' => $this->faker->randomNumber(),
			// 'total_earnings' => $this->faker->randomNumber(),
			// 'total_deductions' => $this->faker->randomNumber(),
			'net_pay' => $this->faker->randomNumber(),
            'gross_pay' => $this->faker->randomNumber(),
			'employee_id' => Employee::factory()->create()->id,
        ];
    }
}
