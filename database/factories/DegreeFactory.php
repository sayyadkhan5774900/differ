<?php

namespace Database\Factories;

use App\Models\Degree;
use Illuminate\Database\Eloquent\Factories\Factory;

class DegreeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Degree::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $degree = ['MSc','BSc','FSc','BBA'];

        return [
            'name' => $degree[array_rand($degree)],
            'description' => $this->faker->sentence,
            'type' => array_rand(Degree::TYPE_SELECT),
            'type' => array_rand(Degree::TYPE_SELECT),
            'fee' => rand(1000, 2000),
            'fee_type' => array_rand(Degree::FEE_TYPE_SELECT),
            'duration' => 12,
        ];
    }
}
