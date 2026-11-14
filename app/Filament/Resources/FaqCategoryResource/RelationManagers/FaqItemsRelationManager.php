<?php

namespace App\Filament\Resources\FaqCategoryResource\RelationManagers;

use App\Models\FaqItem;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

class FaqItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'faqItems';

    protected static ?string $recordTitleAttribute = 'question';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->label('Question')
                    ->required()
                    ->maxLength(500)
                    ->helperText('FAQ question'),
                Forms\Components\Textarea::make('answer')
                    ->label('Answer')
                    ->required()
                    ->rows(4)
                    ->maxLength(2000)
                    ->helperText('FAQ answer (plain text or simple HTML)'),
                Forms\Components\TextInput::make('sort_order')
                    ->label('Display Order')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->helperText('Order within the category'),
                Forms\Components\Toggle::make('is_published')
                    ->label('Published')
                    ->default(true)
                    ->helperText('Whether this FAQ is visible on the website'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question')
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->label('Question')
                    ->searchable()
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('answer')
                    ->label('Answer')
                    ->limit(50)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\Filter::make('published')
                    ->query(fn ($query) => $query->where('is_published', true))
                    ->label('Published'),
                Tables\Filters\Filter::make('draft')
                    ->query(fn ($query) => $query->where('is_published', false))
                    ->label('Draft'),
            ])
            ->headerActions([
                \Filament\Actions\CreateAction::make(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\BulkAction::make('publish')
                        ->label('Publish')
                        ->icon('heroicon-o-check')
                        ->action(fn ($records) => $records->each->update(['is_published' => true])),
                    \Filament\Actions\BulkAction::make('unpublish')
                        ->label('Unpublish')
                        ->icon('heroicon-o-x-mark')
                        ->action(fn ($records) => $records->each->update(['is_published' => false])),
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }
}
