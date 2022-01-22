<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		return[
       		'asset_tag' => 'BHSITALP00' . $this->faker->unique()->randomDigit(),
			'manufacturer' => $this->faker->word(),
			'model'=> $this->faker->word(),
			'asset_color' => $this->faker->word(),
			'asset_type' => $this->faker->word(),
			'serial_number' => 'SR.NO' .  $this->faker->randomNumber(),
			'purchase_date' => $this->faker->date(),
			'purchase_amount' => $this->faker->word(),
			'order_number' => $this->faker->word(),
			'current_user'=> $this->faker->firstName(),
			'previous_user' => $this->faker->name(),
			'condition_notes' => $this->faker->word(),
			'due_date'=>$this->faker->date(),
			'host_name'=>$this->faker->name(),
			'processor'=>$this->faker->word(),
			'os_name'=>$this->faker->word(),
			'physical_memory'=>$this->faker->randomNumber(),
			'graphics_card'=>$this->faker->word(), 
			'hard_disks'=>$this->faker->word(),
			'mac_address'=>$this->faker->macAddress(),
			'enrolled_with_dcme'=>'Yes',
			'issued_date'=>$this->faker->date(),


			

			'employee_id' => Employee::factory()->create()->id,
        ];
    }
}
