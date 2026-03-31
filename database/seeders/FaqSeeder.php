<?php

declare(strict_types=1);

namespace Agenciafmd\Faqs\Database\Seeders;

use Agenciafmd\Faqs\Models\Faq;
use Illuminate\Database\Seeder;

final class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::query()
            ->truncate();

        Faq::factory()
            ->count(50)
            ->create();
    }
}
