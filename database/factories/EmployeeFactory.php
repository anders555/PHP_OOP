<?php

namespace Database\Factories;

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
          return [
              'full_name' =>$this->faker->name(),
              'about' =>$this->faker->text(500),
              'tel'=>$this->faker->phoneNumber(),
              'at_work'=>$this->faker->boolean,
          ];
    }
}
