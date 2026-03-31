<?php

declare(strict_types=1);

namespace Agenciafmd\Faqs;

use Agenciafmd\Faqs\Resources\Faqs\FaqResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

final class FaqsPlugin implements Plugin
{
    public static function make(): static
    {
        return resolve(self::class);
    }

    public function getId(): string
    {
        return 'faqs';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                FaqResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
