<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $testimonials = [
            [
                'sying_text' => $faker->paragraph,
                'name'       => $faker->name,
                'position'   => $faker->word,
            ],
           
            [
                'sying_text' => $faker->paragraph,
                'name'       => $faker->name,
                'position'   => $faker->word,
            ],
           
            [
                'sying_text' => $faker->paragraph,
                'name'       => $faker->name,
                'position'   => $faker->word,
            ],
           
            [
                'sying_text' => $faker->paragraph,
                'name'       => $faker->name,
                'position'   => $faker->word,
            ],
           
            [
                'sying_text' => $faker->paragraph,
                'name'       => $faker->name,
                'position'   => $faker->word,
            ],
           
            [
                'sying_text' => $faker->paragraph,
                'name'       => $faker->name,
                'position'   => $faker->word,
            ],
           
        ];
        foreach($testimonials as $key => $testimonial)
        {
            $photo_id = $key+1;
            $testimonial = Testimonial::create($testimonial);
            $testimonial->addMedia(storage_path()."/seeders/speakers/$photo_id.jpg")->preservingOriginal()->toMediaCollection('image');
        }
    }
}
