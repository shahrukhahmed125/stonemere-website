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
use App\Filament\Resources\ServiceAreaResource\RelationManagers\FaqItemsRelationManager;
use App\Filament\Resources\ServiceAreaResource\RelationManagers\CallFlowItemsRelationManager;

class ServiceAreaResource extends Resource
{
    protected static ?string $model = ServiceArea::class;

    protected static ?string $navigationLabel = 'Service Areas';

    protected static ?int $navigationSort = 1;

    protected static string | \UnitEnum | null $navigationGroup = 'Services';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-briefcase';

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
                        Forms\Components\Textarea::make('hero_lead')
                            ->label('Hero Lead')
                            ->rows(3)
                            ->maxLength(1000)
                            ->columnSpanFull()
                            ->helperText('Intro paragraph shown under the page heading'),
                    ]),

                \Filament\Schemas\Components\Section::make('Hero Buttons')
                    ->schema([
                        Forms\Components\TextInput::make('hero_cta_primary_text')->label('Primary Button Text'),
                        Forms\Components\TextInput::make('hero_cta_primary_url')->label('Primary Button URL')->columnSpanFull(),
                        Forms\Components\TextInput::make('hero_cta_secondary_text')->label('Secondary Button Text'),
                        Forms\Components\TextInput::make('hero_cta_secondary_url')->label('Secondary Button URL')->columnSpanFull(),
                    ])
                    ->columns(2),

                \Filament\Schemas\Components\Section::make('Services Section')
                    ->schema([
                        Forms\Components\TextInput::make('services_eyebrow')->label('Eyebrow'),
                        Forms\Components\TextInput::make('services_heading')->label('Heading')
                            ->helperText('Use {count} where the number of services appears. Basic HTML like <em> allowed.'),
                        Forms\Components\Textarea::make('services_intro')->label('Intro')->rows(2)->columnSpanFull(),
                    ])
                    ->columns(2),

                \Filament\Schemas\Components\Section::make('Scenarios Section')
                    ->schema([
                        Forms\Components\TextInput::make('scenarios_eyebrow')->label('Eyebrow'),
                        Forms\Components\TextInput::make('scenarios_heading')->label('Heading')
                            ->helperText('Basic HTML like <em> allowed.'),
                    ])
                    ->columns(2),

                \Filament\Schemas\Components\Section::make('FAQ Section')
                    ->schema([
                        Forms\Components\TextInput::make('faqs_eyebrow')->label('Eyebrow'),
                        Forms\Components\TextInput::make('faqs_heading')->label('Heading')
                            ->helperText('Basic HTML like <em> allowed.'),
                    ])
                    ->columns(2),

                \Filament\Schemas\Components\Section::make('Timeline Section (Care & Professional Liaison)')
                    ->schema([
                        Forms\Components\TextInput::make('timeline_eyebrow')->label('Eyebrow'),
                        Forms\Components\TextInput::make('timeline_heading')->label('Heading')
                            ->helperText('Basic HTML like <em> allowed.'),
                    ])
                    ->columns(2),

                \Filament\Schemas\Components\Section::make('Checks Section (Property & Asset Management)')
                    ->schema([
                        Forms\Components\TextInput::make('checks_eyebrow')->label('Eyebrow'),
                        Forms\Components\TextInput::make('checks_heading')->label('Heading')
                            ->helperText('Basic HTML like <em> allowed.'),
                        Forms\Components\Textarea::make('checks_intro')->label('Intro')->rows(2)->columnSpanFull(),
                    ])
                    ->columns(2),

                \Filament\Schemas\Components\Section::make('Call Flow Section (Urgent & Complex Cases)')
                    ->schema([
                        Forms\Components\TextInput::make('callflow_eyebrow')->label('Eyebrow'),
                        Forms\Components\TextInput::make('callflow_heading')->label('Heading')
                            ->helperText('Basic HTML like <em> allowed.'),
                        Forms\Components\Textarea::make('callflow_note')->label('Note below the steps')->rows(2)->columnSpanFull(),
                    ])
                    ->columns(2),

                \Filament\Schemas\Components\Section::make('Bottom CTA Band')
                    ->schema([
                        Forms\Components\TextInput::make('cta_eyebrow')->label('Eyebrow'),
                        Forms\Components\TextInput::make('cta_heading')->label('Heading')->columnSpanFull(),
                        Forms\Components\Textarea::make('cta_text')->label('Text')->rows(2)->columnSpanFull(),
                        Forms\Components\TextInput::make('cta_primary_text')->label('Primary Button Text'),
                        Forms\Components\TextInput::make('cta_primary_url')->label('Primary Button URL')->columnSpanFull(),
                        Forms\Components\TextInput::make('cta_secondary_text')->label('Secondary Button Text'),
                        Forms\Components\TextInput::make('cta_secondary_url')->label('Secondary Button URL')->columnSpanFull(),
                    ])
                    ->columns(2),
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
            FaqItemsRelationManager::class,
            CallFlowItemsRelationManager::class,
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
