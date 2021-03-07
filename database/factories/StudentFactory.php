<?php

namespace Database\Factories;

use App\Models\Batch;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $batch = Batch::inRandomOrder()->first();

        $qualification = ['MSc','BSc','FSc','BBA'];

        return [
            'degree_id' => $batch->degree->id,
            'batch_id' => $batch->id,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'father_name' => $this->faker->name,
            'gender' => array_rand(Student::GENDER_RADIO),
            'qualification' => $qualification[array_rand($qualification)],
            'date_of_birth' => now()->subYear(rand(18, 23))->format(config('panel.date_format')),
            'registration_no' => $this->faker->unique()->bankAccountNumber,
            'registration_date' => now()->subYear(rand(1, 5))->format(config('panel.date_format')),
        ];
    }
}
