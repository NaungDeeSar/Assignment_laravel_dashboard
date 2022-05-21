<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Database\Seeder;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Department::factory(4)->create();
        // Position::factory(4)->create();
        //Employee::factory(4)->create();
        // \App\Models\User::factory(10)->create();
        $this->call([
            
            departmenSeeder::class,
            positionSeeder::class,
            stateSeeder::class,
            citySeeder::class,
            userSeeder::class
           
        ]);
      
    }
}
