<?php

namespace Database\Seeders;

use App\Models\StudyMaterial;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StudyMaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $materials = [
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
            ],
            
        ];
        foreach($materials as $key => $material)
        {
            $photo_id = $key+1;
            $material = StudyMaterial::create($material);
            $material->addMedia(storage_path()."/seeders/speakers/$photo_id.jpg")->preservingOriginal()->toMediaCollection('file');
        }
    }
}
