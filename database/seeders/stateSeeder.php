<?php

namespace Database\Seeders;

use App\Models\state;
use Illuminate\Database\Seeder;

class stateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = ['Kachin', 'Kayah', 'Karen', 'Chin','Mon','RakHine','Shan'];

        for ($i = 0; $i < count($states); $i++) {

            state::create([
                'name' => $states[$i],
            ]);
        }
    }
}
