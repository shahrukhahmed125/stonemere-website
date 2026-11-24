<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicePriceResource\Pages\CreateServicePrice;
use App\Filament\Resources\ServicePriceResource\Pages\EditServicePrice;
use App\Filament\Resources\ServicePriceResource\Pages\ListServicePrices;
use App\Models\ServicePrice;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ServicePriceResource extends Resource
{
    protected static ?string $model = ServicePrice::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Service Pricing';

    protected static ?int $navigationSort = 3;

    protected static string | \UnitEnum | null $navigationGroup = 'Website Content';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Section::make('Service')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->rows(2)
                            ->maxLength(1000)
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Pricing')
                    ->schema([
                        Forms\Components\TextInput::make('price_text')
                            ->label('Price Display')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Shown verbatim on the price menu, e.g. "From £110 per hour" or "£45 first 18 minutes; then £15 per 6 minutes".'),
                        Forms\Components\Select::make('price_type')
                            ->options(ServicePrice::PRICE_TYPES)
                            ->default('custom')
                            ->required()
                            ->helperText('Categorises the pricing style.'),
                        Forms\Components\TextInput::make('price_amount')
                            ->numeric()
                            ->prefix('£')
                            ->helperText('Optional — the numeric price for reporting/filtering.'),
                        Forms\Components\TextInput::make('price_max')
                            ->numeric()
                            ->prefix('£')
                            ->helperText('Optional — upper bound for ranged prices.'),
                        Forms\Components\TextInput::make('minimum_amount')
                            ->numeric()
                            ->prefix('£')
                            ->helperText('Optional — minimum charge, e.g. for percentage fees.'),
                        Forms\Components\TextInput::make('price_unit')
                            ->label('Price Unit')
                            ->placeholder('per hour')
                            ->maxLength(50)
                            ->helperText('Optional — e.g. "per hour", "per visit".'),
                        Forms\Components\Textarea::make('additional_info')
                            ->label('Additional Pricing Information')
                            ->rows(2)
                            ->maxLength(1000)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Display')
                    ->schema([
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->required()
                            ->helperText('Lower numbers appear first.'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Inactive items are hidden everywhere.'),
                        Forms\Components\Toggle::make('show_on_website')
                            ->label('Show on Website')
                            ->default(true)
                            ->helperText('Show in the public price menu table.'),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_text')
                    ->label('Price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_type')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(fn ($state) => ServicePrice::PRICE_TYPES[$state] ?? $state),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('show_on_website')
                    ->label('On Site')
                    ->boolean(),
            ])
            ->defaultSort('sort_order')
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServicePrices::route('/'),
            'create' => CreateServicePrice::route('/create'),
            'edit' => EditServicePrice::route('/{record}/edit'),
        ];
    }
}
