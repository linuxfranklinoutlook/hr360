<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		$address = json_encode([
			'addr_line_1' => 'testing street',
			'addr_line_2' => 'testing city',
			'city' => 'Chennai',
			'state' => 'Tamil Nadu',
			'pincode' => '600125',
		]);

        return [
            //
			'first_name' => $this->faker->firstName(),
			'last_name' => $this->faker->lastName(),
			'middle_name'=> $this->faker->name(),
			'personal_email' => $this->faker->email(),
			'phone_number' => $this->faker->phoneNumber(),
			'emp_id' => 'BHS000' .  $this->faker->unique()->randomNumber(),
			'emp_type' => 'Full Time',
			'location' => 'Remote',
			'status' => 'active',
			'gender'=> $this->faker->word(),
			'permanent_address' => $address,
			'current_address' => $address,
			'blood_group'=>$this->faker->bloodGroup(),
			'aadhar'=>$this->faker->randomNumber(),
			'pan'=>$this->faker->randomLetter(),
			'emergency_contact_name'=>$this->faker->name(),
			'emergency_contact_number'=>$this->faker->randomNumber(),
			'emergency_relationship'=>$this->faker->word(),
			'date_of_birth'=>$this->faker->date(),
			'date_of_joining'=>$this->faker->date(),
			'notes'=>$this->faker->sentence(),
			'desigination'=>$this->faker->jobTitle(),


			

			'user_id' => User::factory()->create()->id,
        ];
    }
}
