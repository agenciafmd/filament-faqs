<?php

declare(strict_types=1);

namespace Agenciafmd\Faqs\Services;

final class FaqService
{
    public static function make(): static
    {
        return resolve(self::class);
    }
}
