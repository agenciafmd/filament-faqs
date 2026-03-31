<?php

declare(strict_types=1);

namespace Agenciafmd\Faqs\Resources\Faqs;

use Agenciafmd\Faqs\Models\Faq;
use Agenciafmd\Faqs\Resources\Faqs\Pages\CreateFaq;
use Agenciafmd\Faqs\Resources\Faqs\Pages\EditFaq;
use Agenciafmd\Faqs\Resources\Faqs\Pages\ListFaqs;
use Agenciafmd\Faqs\Resources\Faqs\Schemas\FaqForm;
use Agenciafmd\Faqs\Resources\Faqs\Tables\FaqsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Override;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;

final class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?int $navigationSort = 5;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQuestionMarkCircle;

    protected static ?string $recordTitleAttribute = 'name';

    #[Override]
    public static function getModelLabel(): string
    {
        return __('Faq');
    }

    #[Override]
    public static function getPluralModelLabel(): string
    {
        return __('Faqs');
    }

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return FaqForm::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return FaqsTable::configure($table);
    }

    #[Override]
    public static function getRelations(): array
    {
        return [
            AuditsRelationManager::class,
        ];
    }

    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListFaqs::route('/'),
            'create' => CreateFaq::route('/create'),
            'edit' => EditFaq::route('/{record}/edit'),
        ];
    }

    #[Override]
    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
