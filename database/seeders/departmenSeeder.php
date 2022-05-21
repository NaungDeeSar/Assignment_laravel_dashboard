<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class departmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deps = ['Software', 'Hardware', 'IT', 'HR','English','Marketing'];

        for ($i = 0; $i < count($deps); $i++) {

            Department::create([
                'name' => $deps[$i],
            ]);
        }
    }
}
