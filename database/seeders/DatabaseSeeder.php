<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SemesterSeeder::class,
            StudentSeeder::class,
            LecturerSeeder::class,
            CourseSeeder::class,
            StudentCourseSeeder::class,
        ]);
    }
}
