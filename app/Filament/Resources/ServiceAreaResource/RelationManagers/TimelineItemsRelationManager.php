<?php

namespace App\Filament\Resources\ServiceAreaResource\RelationManagers;

use App\Models\ServiceAreaTimelineItem;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

class TimelineItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'timelineItems';

    protected static ?string $recordTitleAttribute = 'tab_label';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('tab_label')
                    ->label('Tab Label')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Display label for the timeline tab'),
                Forms\Components\TextInput::make('tab_id')
                    ->label('Tab ID')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Unique identifier for the tab (e.g., tab-before)'),
                Forms\Components\KeyValue::make('content')
                    ->label('Content Items')
                    ->keyLabel('Item Index')
                    ->valueLabel('Content')
                    ->canAddKeys(true)
                    ->canDeleteKeys(true)
                    ->canEditKeys(true)
                    ->helperText('Timeline content items (JSON array)'),
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
            ->recordTitleAttribute('tab_label')
            ->columns([
                Tables\Columns\TextColumn::make('tab_label')
                    ->label('Tab Label')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tab_id')
                    ->label('Tab ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('content')
                    ->label('Items Count')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) : 0)
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->filters([
                //
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
