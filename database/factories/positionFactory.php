<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class positionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->jobTitle,
            'price'=>(random_int(2,21)*20000)+100000,
            'dep_id'=>Department::all()->random()->id
        ];
    }
}
