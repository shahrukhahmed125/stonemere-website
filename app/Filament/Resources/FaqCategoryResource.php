<?php

namespace App\Filament\Resources;

use App\Models\FaqCategory;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Filament\Resources\FaqCategoryResource\RelationManagers\FaqItemsRelationManager;

class FaqCategoryResource extends Resource
{
    protected static ?string $model = FaqCategory::class;

    protected static ?string $navigationLabel = 'FAQ Categories';

    protected static ?int $navigationSort = 1;

    protected static string | \UnitEnum | null $navigationGroup = 'FAQs';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('FAQ Category Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Category name (e.g., General)'),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('URL-friendly identifier'),
                        Forms\Components\TextInput::make('page_reference')
                            ->label('Page Reference')
                            ->maxLength(255)
                            ->helperText('Reference to the page where FAQs appear (e.g., home)'),
                        Forms\Components\TextInput::make('sort_order')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->helperText('Display order'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('page_reference')
                    ->label('Page Reference')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('faq_items_count')
                    ->label('FAQ Items')
                    ->counts('faqItems')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }

    public static function getRelations(): array
    {
        return [
            FaqItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\FaqCategoryResource\Pages\ListFaqCategories::route('/'),
            'create' => \App\Filament\Resources\FaqCategoryResource\Pages\CreateFaqCategory::route('/create'),
            'edit' => \App\Filament\Resources\FaqCategoryResource\Pages\EditFaqCategory::route('/{record}/edit'),
        ];
    }
}
