<?php

use Illuminate\Database\Seeder;
use roombooker\Faculty;
use roombooker\Major;

class FacultiesAndMajorsTableSeeder extends Seeder
{
    private static $list = [
        'Business School'=> [
            'Accounting',
            'Management',
        ],
        'Design'=> [
            'Visual Communication Design',
            'Interior Design',
            'Product Design',
            'Architecture',
        ],
        'Computer Science'=> [
            'Information Systems',
            'Informatics Engineering',
        ],
        'Law'=> [
            'Law',
        ],
        'Music'=> [
            'Music',
        ],
        'Education'=> [
            'English Language Education',
            'Primary Education',
            'Indonesian Language Education',
            'Mathematics Education',
            'Biology Education',
            'Christian Religion Education',
            'Social Science Education',
            'Chemistry Education',
            'Physics Education',
            'Economics Education',
        ],
        'Medicine'=> [
            'Medicine',
        ],
        'Nursing'=> [
            'Nursing',
        ],
        'Psychology'=> [
            'Psychology',
        ],
        'Science'=> [
            'Civil Engineering',
            'Industrial Engineering',
            'Biotechnology',
            'Mathematics',
            'Food Technology',
            'Electrical Engineering',
        ],
        'Social & Political Science'=> [
            'International Relations',
            'Communications',
        ],
        'Hospitality & Tourism' => [
            'Travel Industry Management',
            'Hospitality Management',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$list as $faculty => $majors) {
            Faculty::create(['name' => $faculty]);
            $faculty_id = Faculty::where('name', $faculty)->first()->id;
            foreach($majors as $major) {
                Major::create(['name' => $major, 'faculty_id' => $faculty_id]);
            }
        }
    }
}
