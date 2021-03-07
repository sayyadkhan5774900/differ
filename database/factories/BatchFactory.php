<?php

namespace Database\Factories;

use App\Models\Batch;
use App\Models\Degree;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Batch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $year = rand(2009, 2016);
        $month = rand(1, 12);
        $day = rand(1, 28);

        $date = Carbon::create($year, $month, $day, 0, 0, 0);

        return [
            'degree_id' => Degree::inRandomOrder()->first()->id,
            'batch_code' => $this->faker->name,
            'batch_name' => $this->faker->sentence,
            'start_time' => Carbon::createFromTime(8, 0, 0),
            'end_time' => Carbon::createFromTime(16, 0, 0),
            'starting_date' => $date->format(config('panel.date_format')),
            'ending_date' => $date->addYear(2)->format(config('panel.date_format')),
            'is_active' => 'active',
        ];
    }
}
