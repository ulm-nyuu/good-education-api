<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolType;

class SchoolTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['Primary', 'Secondary', 'Combined', 'Special'];
        foreach ($types as $type) {
            SchoolType::firstOrCreate(['type_name' => $type]);
        }
    }
}
