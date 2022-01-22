<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\Employee;

class TaskFactory extends Factory
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

            // 'starting_date'=>$this->faker->date(),
            // 'ending_date'=>$this->faker->date(),

            // 'assign_to_developers'=>$this->faker->name(),
            // 'assign_to_designers'=>$this->faker->name(),
            // 'assign_to_testers'=>$this->faker->name(),
            'task_status'=>('Pending'),
            'notes'=>$this->faker->sentence(),
            'project_id' => Project::factory()->create()->id,
            'employee_id' => Employee::factory()->create()->id,
        ];
    }
}
