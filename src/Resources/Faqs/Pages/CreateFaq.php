<?php

declare(strict_types=1);

namespace Agenciafmd\Faqs\Resources\Faqs\Pages;

use Agenciafmd\Admix\Resources\Concerns\RedirectBack;
use Agenciafmd\Faqs\Resources\Faqs\FaqResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateFaq extends CreateRecord
{
    use RedirectBack;

    protected static string $resource = FaqResource::class;
}
