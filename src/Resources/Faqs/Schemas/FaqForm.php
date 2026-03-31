<?php

declare(strict_types=1);

namespace Agenciafmd\Faqs\Resources\Faqs\Schemas;

use Agenciafmd\Admix\Resources\Forms\Components\RichEditorWithDefault;
use Agenciafmd\Admix\Resources\Infolists\Components\DateTimeEntry;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

final class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('General'))
                    ->schema([
                        TextInput::make('name')
                            ->translateLabel()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (($get('slug') ?? '') !== str($old)->slug()->toString()) {
                                    return;
                                }

                                $set('slug', str($state)->slug()->toString());
                            })
                            ->autofocus()
                            ->minLength(3)
                            ->maxLength(255)
                            ->required(),
                        TextInput::make('slug')
                            ->translateLabel()
                            ->unique()
                            ->required(),
                        RichEditorWithDefault::make(name: 'description', directory: 'faq/description')
                            ->translateLabel()
                            ->columnSpanFull(),
                        TextInput::make('sort')
                            ->translateLabel()
                            ->numeric()
                            ->minValue(0)
                    ])
                    ->collapsible()
                    ->columns()
                    ->columnSpan(2),
                Section::make(__('Information'))
                    ->schema([
                        Toggle::make('is_active')
                            ->translateLabel()
                            ->default(true)
                            ->columnSpan(2),
                        DateTimeEntry::make('created_at'),
                        DateTimeEntry::make('updated_at'),
                    ])
                    ->collapsible()
                    ->columns(),
            ])
            ->columns(3);
    }
}
