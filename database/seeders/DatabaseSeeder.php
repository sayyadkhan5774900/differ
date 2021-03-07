<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,

              //Database seeders
              DegreeTableSeeder::class,
              BatchTableSeeder::class,
              SubjectTableSeeder::class,
              StudentTableSeeder::class,
              HomeSliderTableSeeder::class,
              ServicesTableSeeder::class,
              TestimonialTableSeeder::class,
              FaqsTableSeeder::class,
              TeamTableSeeder::class,
              PostsTableSeeder::class,
              NoticeboardTableSeeder::class,
              StudyMaterialTableSeeder::class,
              SettingsTableSeeder::class,
              NotificationTableSeeder::class,
        ]);
    }
}
