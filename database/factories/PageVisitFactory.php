<?php

namespace Database\Factories;

use App\Models\PageVisit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageVisit>
 */
class PageVisitFactory extends Factory
{
    protected $model = PageVisit::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => '/'.ltrim($this->faker->unique()->slug(2), '/'),
            'full_url' => $this->faker->url(),
            'referer' => null,
            'ip' => 'hashed-ip',
            'user_agent' => $this->faker->userAgent(),
            'visited_at' => now(),
        ];
    }
}
