<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class teacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = new Teacher();
        $teacher->name = "Daud Simbeye";
        $teacher->title = "Head";
        $teacher->institute = "DIT";
        $teacher->save();

        $teacher2 = new Teacher();
        $teacher2->name = "Lott Champuku";
        $teacher2->title = "Lecture";
        $teacher2->institute = "DIT";
        $teacher2->save();

        $teacher3 = new Teacher();
        $teacher3->name = "Ally Mbute";
        $teacher3->title = "Sponsor";
        $teacher3->institute = "DIT";
        $teacher3->save();
    }
}
