<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
                'name' => 'Ko Ko',
                'major'=> 'Biology',
                'email'=> 'koko@gmail.com',
                'phone_number'=> '0944444444'
            ],
            [
                'name' => 'Mg Mg',
                'major'=> 'Zoology',
                'email'=> 'mgmg@gmail.com',
                'phone_number'=> '0924444444'
            ],
            [
                'name' => 'Aung Aung',
                'major'=> 'Mathematics',
                'email'=> 'aungaung@gmail.com',
                'phone_number'=> '0943444444'
            ],
            [
                'name' => 'Hla Hla',
                'major'=> 'Computer Science',
                'email'=> 'hlahla@gmail.com',
                'phone_number'=> '09444434444'
            ],
            [
                'name' => 'Nu Nu',
                'major'=> 'English',
                'email'=> 'nunu@gmail.com',
                'phone_number'=> '0945444444'
            ],
            [
                'name' => 'Chloe',
                'major'=> 'Biology',
                'email'=> 'chloe@gmail.com',
                'phone_number'=> '0944444444'
            ],
            [
                'name' => 'Freddy',
                'major'=> 'Zoology',
                'email'=> 'freddy@gmail.com',
                'phone_number'=> '0924444444'
            ],
            [
                'name' => 'Amaron',
                'major'=> 'Mathematics',
                'email'=> 'amaron@gmail.com',
                'phone_number'=> '0943444444'
            ],
            [
                'name' => 'James',
                'major'=> 'Computer Science',
                'email'=> 'james@gmail.com',
                'phone_number'=> '09444434444'
            ],
            [
                'name' => 'Mary',
                'major'=> 'English',
                'email'=> 'mary@gmail.com',
                'phone_number'=> '0945444444'
            ]
        ];

        DB::table('students')->truncate();

        foreach($students as $value) {
            DB::table('students')->insert([
                'name' => $value['name'],
                'major' => $value['major'],
                'email' => $value['email'],
                'phone_number' => $value['phone_number']
            ]);
        }
    }
}
