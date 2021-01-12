<?php

namespace Database\Factories;

use App\Models\Developer;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeveloperFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Developer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'language'=>$this->faker->randomElement(['php','net','python']),
        ];
    }
}
