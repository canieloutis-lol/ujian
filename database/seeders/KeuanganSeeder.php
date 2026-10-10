<?php

namespace Database\Seeders;

use App\Models\Keuangan;
use App\Models\KeuanganDetail;
use Illuminate\Database\Seeder;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Keuangan::factory()
            ->count(5)
            ->has(Keuangan::factory()->count(3), 'details')
            ->create();
    }
}
