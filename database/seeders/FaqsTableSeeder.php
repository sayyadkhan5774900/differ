<?php

namespace Database\Seeders;

use App\Models\Faq;
use Faker\Factory;
use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $faqs = [
            [
                'question'      => $faker->sentence."?",
                'answer'  => $faker->paragraph
            ],
            [
                'question'      => $faker->sentence."?",
                'answer'  => $faker->paragraph
            ],
            [
                'question'      => $faker->sentence."?",
                'answer'  => $faker->paragraph
            ],
            [
                'question'      => $faker->sentence."?",
                'answer'  => $faker->paragraph
            ],
            [
                'question'      => $faker->sentence."?",
                'answer'  => $faker->paragraph
            ],
            [
                'question'      => $faker->sentence."?",
                'answer'  => $faker->paragraph
            ],
            [
                'question'      => $faker->sentence."?",
                'answer'  => $faker->paragraph
            ],
        ];
        foreach($faqs as $key => $faq)
        {
            $faq = Faq::create($faq);
        }
    }
}
