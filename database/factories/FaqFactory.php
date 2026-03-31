<?php

declare(strict_types=1);

namespace Agenciafmd\Faqs\Database\Factories;

use Agenciafmd\Faqs\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

final class FaqFactory extends Factory
{
    protected $model = Faq::class;

    public function definition(): array
    {
        $name = fake()->sentence(4);
        $slug = str()->slug($name);

        return [
            'is_active' => fake()->boolean(),
            'name' => $name,
            'slug' => $slug,
            'description' => fake()->htmlParagraphs(2),
            'sort' => fake()->numberBetween(1, 50),
        ];
    }
}
