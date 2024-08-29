<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    public function run(): void
    {
        // Cria 10 instâncias da model Artist usando a factory
        Artist::factory()->count(10)->create();
    }
}
