<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'client_name' => $this->faker->name(),
			'client_id'=> $this->faker->randomDigit(),
			'client_owner_name' => $this->faker->name(),
            'client_owner_email'=>$this->faker->email(),
            'client_owner_number'=>$this->faker->numerify(),
            'address'=>$this->faker->address(),
            'client_contact_person'=> json_encode([$this->faker->name()]),
            'client_contact_number'=> json_encode([$this->faker->numerify()]),
            'client_contact_email'=> json_encode([$this->faker->email()]),
        ];
    }
}
