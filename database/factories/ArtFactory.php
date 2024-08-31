<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Art;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Art>
 */
class ArtFactory extends Factory
{
    protected $model = Art::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph,
            'image_url' => 'images/tatoo_01.jpg', // Caminho relativo à pasta public
            'artist_id' => Artist::factory(),
            'price' => $this->faker->randomFloat(2, 50, 500),
        ];
    }
}
