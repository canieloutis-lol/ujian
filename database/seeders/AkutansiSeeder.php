<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkutansiSeeder extends Seeder
{


    public function run(): void

    {
        \App\Models\Akutansi::factory()
            ->count(10)
            ->for(\App\Models\User::factory())
            ->create();
    }
}
