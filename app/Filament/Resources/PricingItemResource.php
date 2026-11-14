<?php

namespace App\Filament\Resources;

use App\Models\PricingItem;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

class PricingItemResource extends Resource
{
    protected static ?string $model = PricingItem::class;

    protected static ?string $navigationLabel = 'Pricing Items';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Pricing Item Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Item name (e.g., Transport, Procurement)'),
                        Forms\Components\Textarea::make('description')
                            ->rows(2)
                            ->maxLength(500)
                            ->helperText('Brief description of the pricing item'),
                        Forms\Components\Select::make('type')
                            ->required()
                            ->options([
                                'membership' => 'Membership',
                                'separate' => 'Charged Separately',
                            ])
                            ->default('separate')
                            ->helperText('Type of pricing item'),
                        Forms\Components\Select::make('membership_level_id')
                            ->label('Membership Level')
                            ->relationship('membershipLevel', 'name')
                            ->nullable()
                            ->helperText('Optional: Link to a membership level'),
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
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'membership' => 'success',
                        'separate' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'membership' => 'Membership',
                        'separate' => 'Charged Separately',
                        default => $state,
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('membershipLevel.name')
                    ->label('Membership Level')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'membership' => 'Membership',
                        'separate' => 'Charged Separately',
                    ]),
                Tables\Filters\SelectFilter::make('membership_level_id')
                    ->label('Membership Level')
                    ->relationship('membershipLevel', 'name'),
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

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\PricingItemResource\Pages\ListPricingItems::route('/'),
            'create' => \App\Filament\Resources\PricingItemResource\Pages\CreatePricingItem::route('/create'),
            'edit' => \App\Filament\Resources\PricingItemResource\Pages\EditPricingItem::route('/{record}/edit'),
        ];
    }
}
