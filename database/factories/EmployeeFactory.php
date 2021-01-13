<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Designer;
use App\Models\Developer;
use App\Models\Employee;
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
        $morphModel = $this->faker->randomElement([Developer::class,Designer::class]);
        $company = Company::first();
        return [
            'company_id'=> $company->id,
            'name'=>$this->faker->name,
            'surname'=>$this->faker->lastName,
            'age'=>$this->faker->numberBetween(18,50),
            'employable_type'=> $morphModel,
            'employable_id'=>$morphModel::factory(),

        ];
    }
}
