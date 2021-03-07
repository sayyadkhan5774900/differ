<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\Notification;
use App\Models\Student;
use Faker\Factory;
use Illuminate\Database\Seeder;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $batch = Batch::inRandomOrder()->active()->first();

        $student = Student::find(6);

        $notifications = [
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
                'batch_id' => $batch->id,
                'student_id' => $student->id,
                'type' => 'date_sheet'
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
                'batch_id' => $batch->id,
                'student_id' => $student->id,
                'type' => 'date_sheet'
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
                'batch_id' => $batch->id,
                'student_id' => $student->id,
                'type' => 'date_sheet'
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
                'batch_id' => $batch->id,
                'student_id' => $student->id,
                'type' => 'date_sheet'
            ],
        ];
        foreach($notifications as $key => $notification)
        {
            $photo_id = $key+1;
            $notification = Notification::create($notification);
            $notification->addMedia(storage_path()."/seeders/speakers/$photo_id.jpg")->preservingOriginal()->toMediaCollection('attachment');
        }
        $notifications = [
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
                'batch_id' => $batch->id,
                'student_id' => $student->id,
                'type' => 'result'
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
                'batch_id' => $batch->id,
                'student_id' => $student->id,
                'type' => 'result'
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
                'batch_id' => $batch->id,
                'student_id' => $student->id,
                'type' => 'result'
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
                'batch_id' => $batch->id,
                'student_id' => $student->id,
                'type' => 'result'
            ],
        ];
        foreach($notifications as $key => $notification)
        {
            $photo_id = $key+1;
            $notification = Notification::create($notification);
            $notification->addMedia(storage_path()."/seeders/speakers/$photo_id.jpg")->preservingOriginal()->toMediaCollection('attachment');
        }
        $notifications = [
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
                'batch_id' => $batch->id,
                'student_id' => $student->id,
                'type' => 'attendence'
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
                'batch_id' => $batch->id,
                'student_id' => $student->id,
                'type' => 'attendence'
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
                'batch_id' => $batch->id,
                'student_id' => $student->id,
                'type' => 'attendence'
            ],
            [
                'title'       => $faker->sentence,
                'description'   => $faker->paragraph,
                'batch_id' => $batch->id,
                'student_id' => $student->id,
                'type' => 'attendence'
            ],
        ];
        foreach($notifications as $key => $notification)
        {
            $photo_id = $key+1;
            $notification = Notification::create($notification);
            $notification->addMedia(storage_path()."/seeders/speakers/$photo_id.jpg")->preservingOriginal()->toMediaCollection('attachment');
        }
    }
}
