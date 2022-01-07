<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semesters = ['1st Semester', '2nd Semester'];
        foreach ($semesters as $semester){
            Semester::updateOrCreate([
                'name' => $semester
            ]);
        }
    }
}
