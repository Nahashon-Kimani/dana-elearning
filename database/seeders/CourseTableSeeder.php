<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'name'=>'CPA Section 1',
            'desc'=>'very good course',
            'summary'=>'very good course',
            'cost'=> 200,
            'duration'=>7,
            'syllabus_id'=>1,
            'user_id'=>1,
            'created_by'=>1
        ]);
    }
}
