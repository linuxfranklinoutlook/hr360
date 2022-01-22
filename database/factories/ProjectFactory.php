<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\Client;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_name' => $this->faker->word(),
            'project_manager'=>$this->faker->name(),
            'description'=>$this->faker->sentence(),
            'requested_by'=>$this->faker->name(),
            'requested_on'=>$this->faker->date(),
            'effort_estimation_by'=>$this->faker->name(),
            'estimated_hours'=>$this->faker->time(),
            'deployed_on_staging'=>$this->faker->boolean(),
            'deployed_on_production'=>$this->faker->boolean(),
            'delivered_on'=>$this->faker->date(),
            'current_status'=>$this->faker->word(),
            // 'developers'=>$this->faker->name(),
            // 'designers'=>$this->faker->name(),
            'notes'=>$this->faker->sentence(),
            'client_id' => Client::factory()->create()->id,
        ];
    }
}
