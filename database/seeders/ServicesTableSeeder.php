<?php

namespace Database\Seeders;

use App\Models\Service;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $services = [
            [
                'name'              => 'BSc Computer Science',
                'title'       => 'Quas alias incidunt incidunt alias incidunt incidunt.',
                'excerpt'           => $faker->sentence,
                'description'  => $faker->paragraph
            ],
            [
                'name'              => 'BBA',
                'title'       => 'Quas alias incidunt incidunt alias incidunt incidunt.',
                'excerpt'           => $faker->sentence,
                'description'  => $faker->paragraph
            ],
            [
                'name'              => 'FSc',
                'title'       => 'Quas alias incidunt incidunt alias incidunt incidunt.',
                'excerpt'           => $faker->sentence,
                'description'  => $faker->paragraph
            ],
            [
                'name'              => 'MA',
                'title'       => 'Quas alias incidunt incidunt alias incidunt incidunt.',
                'excerpt'           => $faker->sentence,
                'description'  => $faker->paragraph
            ],
        ];
        foreach($services as $key => $service)
        {
            $photo_id = $key+1;
            $service = Service::create($service);
            $service->addMedia(storage_path()."/seeders/services/$photo_id.png")->preservingOriginal()->toMediaCollection('image');
        }
    }
}
