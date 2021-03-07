<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\Student;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();
        
        $users = [
            [
                'name'           => $faker->userName,
                'email'          => $faker->safeEmail,
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'name'           => $faker->userName,
                'email'          => $faker->safeEmail,
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'name'           => $faker->userName,
                'email'          => $faker->safeEmail,
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'name'           => $faker->userName,
                'email'          => $faker->safeEmail,
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'name'           => $faker->userName,
                'email'          => $faker->safeEmail,
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'name'           => $faker->userName,
                'email'          => $faker->safeEmail,
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],

        ];

        $batch = Batch::inRandomOrder()->active()->first();

        $qualification = ['MSc','BSc','FSc','BBA'];
        
        foreach($users as $key => $user)
        {
            $user_created = User::create($user);
            $user_created->roles()->sync(3);
            $user_created->student()->create([
                'degree_id' => $batch->degree->id,
                'batch_id' => $batch->id,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'father_name' => $faker->name,
                'mother_name' => $faker->name,
                'address' => $faker->address,
                'city' => $faker->city,
                'state' => $faker->state,
                'nationality' => $faker->country,
                'phone' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'is_active' => 'active',
                'gender' => array_rand(Student::GENDER_RADIO),
                'qualification' => $qualification[array_rand($qualification)],
                'date_of_birth' => now()->subYear(rand(18, 23))->format(config('panel.date_format')),
                'registration_no' => $faker->unique()->bankAccountNumber,
                'registration_date' => now()->subYear(rand(1, 5))->format(config('panel.date_format')),
            ]);
            $photo_id = $key+1;
            $user_created->student->addMedia(storage_path()."/seeders/speakers/$photo_id.jpg")->preservingOriginal()->toMediaCollection('photo');
            $user_created->student->addMedia(storage_path()."/seeders/speakers/$photo_id.jpg")->preservingOriginal()->toMediaCollection('id_proof');
            $user_created->student->addMedia(storage_path()."/seeders/speakers/$photo_id.jpg")->preservingOriginal()->toMediaCollection('signature');
        }
    }
}
