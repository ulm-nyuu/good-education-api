<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $states = [
            ['New South Wales', 'NSW'],
            ['Victoria', 'VIC'],
            ['Queensland', 'QLD'],
            ['South Australia', 'SA'],
            ['Western Australia', 'WA'],
            ['Tasmania', 'TAS'],
            ['Northern Territory', 'NT'],
            ['Australian Capital Territory', 'ACT'],
        ];

        foreach ($states as [$name, $code]) {
            State::firstOrCreate(['state_code' => $code], ['state_name' => $name]);
        }
    }
}
