<?php

namespace Database\Seeders;

use App\Models\city;
use Illuminate\Database\Seeder;

class citySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        city::create([
            'name' => 'Myitkyina',
            'state_id' => 1,
        ]);
        city::create([
            'name' => 'Monyin',
            'state_id' => 1,
        ]);

        city::create([
            'name' => 'Hpa-an',
            'state_id' => 2,
        ]);
        city::create([
            'name' => 'Loikaw',
            'state_id' => 3,
        ]);
        city::create([
            'name' => 'Hakha',
            'state_id' => 4,
        ]);
        city::create([
            'name' => 'Mawlamyine',
            'state_id' => 5,
        ]);
    }
}
