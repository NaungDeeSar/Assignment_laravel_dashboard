<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Education;
use App\Models\WorkHistroy;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' =>'Aye Aye',
            'email'=>'ayeaye@gmail.com',
            'phone'=>'023994244',
            'address'=>'Street yangon',
            'state'=>1,
            'city'=>1,
            'dob' =>'2001-01-07',
            'skill'=>'web developer',
            'position_id'=>2,
            'photo' =>'https://picsum.photos/130/130?image=856',
        ]);
        WorkHistroy::create([
            'emp_id'=>1,
            'position_name'=>'Junior',
            'company_name'=>'MIC',
            'start_date'=>'2018-09-07',
            'end_date'=>'2019-09-08',
            'note'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ipsum veritatis quidem dignissimos qui quisquam. Maxime, esse rerum alias harum',
        ]);

        Education::create([
            'emp_id'=>1,
            'school'=>'BBC',
            'degree'=>'BSC',
            'edu_start_date'=>'2018-09-07',
            'edu_end_date'=>'2019-09-08',
            'edu_note'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ipsum veritatis quidem dignissimos qui quisquam. Maxime, esse rerum alias harum',
        ]);
        

        Employee::create([
            'name' =>'Aung Aung',
            'email'=>'aungaung@gmail.com',
            'phone'=>'097293423',
            'address'=>'Street yangon',
            'state'=>1,
            'city'=>2,
            'dob' =>'2000-01-07',
            'skill'=>'web developer',
            'position_id'=>1,
            'photo' =>'https://picsum.photos/130/130?image=839',
        ]);
        WorkHistroy::create([
            'emp_id'=>2,
            'position_name'=>'Manager',
            'company_name'=>'MMCC',
            'start_date'=>'2019-09-07',
            'end_date'=>'2020-09-08',
            'note'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ipsum veritatis quidem dignissimos qui quisquam. Maxime, esse rerum alias harum',
        ]);

        Education::create([
            'emp_id'=>2,
            'school'=>'UCY',
            'degree'=>'BSC',
            'edu_start_date'=>'2016-09-07',
            'edu_end_date'=>'2020-09-08',
            'edu_note'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ipsum veritatis quidem dignissimos qui quisquam. Maxime, esse rerum alias harum',
        ]);
        

        Employee::create([
            'name' =>'Kimochi',
            'email'=>'japan@gmail.com',
            'phone'=>'0925923423',
            'address'=>'japan',
            'state'=>2,
            'city'=>3,
            'dob' =>'2006-01-07',
            'skill'=>'web developer',
            'position_id'=>3,
            'photo' =>'https://picsum.photos/130/130?image=856',
        ]);
        WorkHistroy::create([
            'emp_id'=>3,
            'position_name'=>'Junior',
            'company_name'=>'MIC',
            'start_date'=>'2018-09-07',
            'end_date'=>'2019-09-08',
            'note'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ipsum veritatis quidem dignissimos qui quisquam. Maxime, esse rerum alias harum',
        ]);

        Education::create([
            'emp_id'=>3,
            'school'=>'High shool',
            'degree'=>'BSC',
            'edu_start_date'=>'2018-09-07',
            'edu_end_date'=>'2019-09-08',
            'edu_note'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ipsum veritatis quidem dignissimos qui quisquam. Maxime, esse rerum alias harum',
        ]);
        

        Employee::create([
            'name' =>'Lalisa',
            'email'=>'lisa@gmail.com',
            'phone'=>'09793242342',
            'address'=>'Korea',
            'state'=>4,
            'city'=>5,
            'dob' =>'2000-01-07',
            'skill'=>'web developer',
            'position_id'=>3,
            'photo' =>'https://picsum.photos/130/130?image=839',
        ]);
        WorkHistroy::create([
            'emp_id'=>4,
            'position_name'=>'Senior',
            'company_name'=>'NNCC',
            'start_date'=>'2013-09-07',
            'end_date'=>'2017-09-08',
            'note'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ipsum veritatis quidem dignissimos qui quisquam. Maxime, esse rerum alias harum',
        ]);

        Education::create([
            'emp_id'=>4,
            'school'=>'UCY',
            'degree'=>'BSC',
            'edu_start_date'=>'2016-09-07',
            'edu_end_date'=>'2022-09-08',
            'edu_note'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ipsum veritatis quidem dignissimos qui quisquam. Maxime, esse rerum alias harum',
        ]);

    }
}
