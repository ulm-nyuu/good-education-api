<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolSector;

class SchoolSectorSeeder extends Seeder
{
    public function run(): void
    {
        $sectors = ['Government', 'Catholic', 'Independent'];
        foreach ($sectors as $sector) {
            SchoolSector::firstOrCreate(['sector_name' => $sector]);
        }
    }
}
