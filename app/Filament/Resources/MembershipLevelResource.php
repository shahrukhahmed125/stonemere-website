<?php

namespace App\Filament\Resources;

use App\Models\MembershipLevel;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

class MembershipLevelResource extends Resource
{
    protected static ?string $model = MembershipLevel::class;

    protected static ?string $navigationLabel = 'Membership Levels';

    protected static ?int $navigationSort = 1;

    protected static string | \UnitEnum | null $navigationGroup = 'Pricing & Memberships';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Membership Level Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Membership level name (e.g., Silver, Gold, Platinum)'),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('URL-friendly identifier'),
                        Forms\Components\Textarea::make('description')
                            ->rows(2)
                            ->maxLength(500)
                            ->helperText('Brief description of the membership level'),
                        Forms\Components\TextInput::make('price_text')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Pricing information (e.g., "Monthly membership · rate on request")'),
                        Forms\Components\TextInput::make('color')
                            ->label('Color')
                            ->placeholder('#C0C0C0')
                            ->helperText('Hex color code for display'),
                        Forms\Components\TextInput::make('sort_order')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->helperText('Display order'),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ]),

                \Filament\Schemas\Components\Section::make('Features')
                    ->schema([
                        Forms\Components\Repeater::make('features')
                            ->label('Feature Items')
                            ->schema([
                                Forms\Components\TextInput::make('text')
                                    ->label('Feature')
                                    ->required()
                                    ->maxLength(500)
                                    ->helperText('Feature description'),
                            ])
                            ->columns(1)
                            ->defaultItems(0)
                            ->reorderable()
                            ->addActionLabel('Add Feature')
                            ->deleteAction(fn (\Filament\Actions\Action $action) => $action->label('Remove'))
                            ->helperText('List of features included in this membership level'),
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
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('price_text')
                    ->label('Price')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('features')
                    ->label('Features')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) : 0)
                    ->sortable(),
                Tables\Columns\TextColumn::make('color')
                    ->label('Color')
                    ->toggleable(isToggledHiddenByDefault: true),
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

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\MembershipLevelResource\Pages\ListMembershipLevels::route('/'),
            'create' => \App\Filament\Resources\MembershipLevelResource\Pages\CreateMembershipLevel::route('/create'),
            'edit' => \App\Filament\Resources\MembershipLevelResource\Pages\EditMembershipLevel::route('/{record}/edit'),
        ];
    }
}
