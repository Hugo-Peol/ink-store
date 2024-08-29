<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Art;

class ArtSeeder extends Seeder
{
    public function run(): void
    {
        // Cria 10 instâncias da model Art usando a factory
        Art::factory()->count(10)->create();
    }
}
