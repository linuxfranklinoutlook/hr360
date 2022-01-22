<?php

namespace Database\Factories;

use App\Models\SalaryRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalaryRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
			'year' => Carbon::now()->format('Y'),
			'employee_id' => 1,
			'month' => '01',
			'gross_in_hand' => 1000,
			'net_in_hand' => 2000
        ];
    }
}
