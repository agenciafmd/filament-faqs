<?php

declare(strict_types=1);

namespace Agenciafmd\Faqs\Tests\Feature\Seeders;

use Agenciafmd\Faqs\Database\Seeders\FaqSeeder;
use Agenciafmd\Faqs\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function Pest\Laravel\seed;

uses(TestCase::class, RefreshDatabase::class);

it('seeds the faqs from the factory', function (): void {
    seed(FaqSeeder::class);

    expect(Faq::query()->count())->toBe(50);
});
