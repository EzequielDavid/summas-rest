<?php

namespace Database\Factories;

use App\Models\Designer;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesignerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Designer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id'=>Employee::factory(),
            'type'=>$this->faker->randomElement(['web','graphic']),
        ];
    }
}
