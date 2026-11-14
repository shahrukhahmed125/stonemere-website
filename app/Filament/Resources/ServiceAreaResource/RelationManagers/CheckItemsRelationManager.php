<?php

namespace App\Filament\Resources\ServiceAreaResource\RelationManagers;

use App\Models\VacantPropertyCheckItem;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

class CheckItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'checkItems';

    protected static ?string $recordTitleAttribute = 'item_text';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('item_text')
                    ->label('Item Text')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Checklist item description'),
                Forms\Components\Toggle::make('is_default_checked')
                    ->label('Default Checked')
                    ->default(false)
                    ->helperText('Whether this item is checked by default'),
                Forms\Components\TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->helperText('Display order'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('item_text')
            ->columns([
                Tables\Columns\TextColumn::make('item_text')
                    ->label('Item')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_default_checked')
                    ->label('Default')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('default_checked')
                    ->query(fn ($query) => $query->where('is_default_checked', true))
                    ->label('Default Checked'),
                Tables\Filters\Filter::make('not_default')
                    ->query(fn ($query) => $query->where('is_default_checked', false))
                    ->label('Not Default'),
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
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }
}
