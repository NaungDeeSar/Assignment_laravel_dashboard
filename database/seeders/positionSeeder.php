<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class positionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name'=>'Senior',
            'price'=>'40000',
            'dep_id'=>1
        ]);

        Position::create([
            'name'=>'Junior',
            'price'=>'30000',
            'dep_id'=>2
        ]);
        Position::create([
            'name'=>'Team Leader',
            'price'=>'60000',
            'dep_id'=>3
        ]);
        Position::create([
            'name'=>'Manager',
            'price'=>'800000',
            'dep_id'=>4
        ]);
    }
}
