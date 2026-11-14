<?php

namespace App\Filament\Resources;

use App\Models\ServiceArea;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Filament\Resources\ServiceAreaResource\RelationManagers\ServicesRelationManager;
use App\Filament\Resources\ServiceAreaResource\RelationManagers\ServiceScenariosRelationManager;
use App\Filament\Resources\ServiceAreaResource\RelationManagers\TimelineItemsRelationManager;
use App\Filament\Resources\ServiceAreaResource\RelationManagers\CheckItemsRelationManager;

class ServiceAreaResource extends Resource
{
    protected static ?string $model = ServiceArea::class;

    protected static ?string $navigationLabel = 'Service Areas';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Service Area Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('URL-friendly identifier'),
                        Forms\Components\TextInput::make('number')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(99)
                            ->helperText('Display number (e.g., 01, 02)'),
                        Forms\Components\Textarea::make('short_description')
                            ->rows(3)
                            ->maxLength(1000)
                            ->helperText('Brief description for listings'),
                        Forms\Components\TextInput::make('hero_image')
                            ->label('Hero Image Path')
                            ->placeholder('assets/images/art/area-family.svg')
                            ->helperText('Path to hero image'),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        Forms\Components\TextInput::make('sort_order')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->helperText('Display order'),
                    ]),

                \Filament\Schemas\Components\Section::make('Page Content')
                    ->schema([
                        Forms\Components\Textarea::make('page_content_json')
                            ->label('Page Content (JSON)')
                            ->rows(14)
                            ->columnSpanFull()
                            ->dehydrated(false)
                            ->helperText('JSON structure powering this page (lead, faqs, callflow). Edit carefully — invalid JSON will be rejected on save.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')
                    ->label('#')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('published')
                    ->query(fn ($query) => $query->where('is_published', true))
                    ->label('Published'),
                Tables\Filters\Filter::make('draft')
                    ->query(fn ($query) => $query->where('is_published', false))
                    ->label('Draft'),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
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
                ]),
            ])
            ->defaultSort('sort_order');
    }

    public static function getRelations(): array
    {
        return [
            ServicesRelationManager::class,
            ServiceScenariosRelationManager::class,
            TimelineItemsRelationManager::class,
            CheckItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\ServiceAreaResource\Pages\ListServiceAreas::route('/'),
            'create' => \App\Filament\Resources\ServiceAreaResource\Pages\CreateServiceArea::route('/create'),
            'edit' => \App\Filament\Resources\ServiceAreaResource\Pages\EditServiceArea::route('/{record}/edit'),
        ];
    }
}
