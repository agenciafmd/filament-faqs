<?php

declare(strict_types=1);

namespace Agenciafmd\Faqs\Resources\Faqs\Pages;

use Agenciafmd\Faqs\Resources\Faqs\FaqResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Override;

final class ListFaqs extends ListRecords
{
    protected static string $resource = FaqResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
