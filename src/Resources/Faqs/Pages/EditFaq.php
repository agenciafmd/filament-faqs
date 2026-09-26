<?php

declare(strict_types=1);

namespace Agenciafmd\Faqs\Resources\Faqs\Pages;

use Agenciafmd\Admix\Resources\Concerns\RedirectBack;
use Agenciafmd\Faqs\Models\Faq;
use Agenciafmd\Faqs\Resources\Faqs\FaqResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use Override;

final class EditFaq extends EditRecord
{
    use RedirectBack;

    protected static string $resource = FaqResource::class;

    /**
     * @var array<int, string>
     */
    protected $listeners = [
        'auditRestored',
    ];

    #[Override]
    public function getRelationManagers(): array
    {
        $record = $this->getRecord();

        if ($record instanceof Faq && $record->trashed()) {
            return [];
        }

        return parent::getRelationManagers();
    }

    public function auditRestored(): void
    {
        $this->fillForm();
    }

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
