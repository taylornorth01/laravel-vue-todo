<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'task_title' => $this->faker->unique()->word(),
            'text_body' => $this->faker->unique()->paragraph(2, false),
            'date_created' => $this->faker->dateTimeThisYear('-1 months'),
            'completed' => $this->faker->boolean()
        ];
    }
}
