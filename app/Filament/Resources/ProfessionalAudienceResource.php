<?php

namespace App\Filament\Resources;

use App\Models\ProfessionalAudience;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

class ProfessionalAudienceResource extends Resource
{
    protected static ?string $model = ProfessionalAudience::class;

    protected static ?string $navigationLabel = 'Professional Audiences';

    protected static ?int $navigationSort = 2;

    protected static string | \UnitEnum | null $navigationGroup = 'Team & Professionals';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user-group';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Audience Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Internal name (e.g., "Care Providers")'),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('URL-friendly identifier (e.g., "care-providers")'),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Display title (e.g., "Domiciliary care companies")'),
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->maxLength(1000)
                            ->helperText('Lead description for the audience'),
                        Forms\Components\FileUpload::make('hero_image')
                            ->label('Hero Image')
                            ->image()
                            ->directory('audience-images')
                            ->visibility('public')
                            ->imagePreviewHeight('150')
                            ->helperText('Upload a hero image for this audience'),
                        Forms\Components\TextInput::make('sort_order')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->helperText('Display order'),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ]),

                \Filament\Schemas\Components\Section::make('Hand Over List')
                    ->schema([
                        Forms\Components\Repeater::make('hand_over_list')
                            ->label('Items')
                            ->schema([
                                Forms\Components\TextInput::make('text')
                                    ->label('Item Text')
                                    ->required()
                                    ->maxLength(500)
                                    ->helperText('Hand-over item description'),
                            ])
                            ->columns(1)
                            ->defaultItems(0)
                            ->reorderable()
                            ->addActionLabel('Add Item')
                            ->deleteAction(fn (\Filament\Actions\Action $action) => $action->label('Remove'))
                            ->helperText('List of items the professional hands over to Stonemere'),
                    ]),

                \Filament\Schemas\Components\Section::make('Get Back List')
                    ->schema([
                        Forms\Components\Repeater::make('get_back_list')
                            ->label('Items')
                            ->schema([
                                Forms\Components\TextInput::make('text')
                                    ->label('Item Text')
                                    ->required()
                                    ->maxLength(500)
                                    ->helperText('Get-back item description'),
                            ])
                            ->columns(1)
                            ->defaultItems(0)
                            ->reorderable()
                            ->addActionLabel('Add Item')
                            ->deleteAction(fn (\Filament\Actions\Action $action) => $action->label('Remove'))
                            ->helperText('List of items the professional gets back from Stonemere'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('hero_image')
                    ->label('Image')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => $record->hero_image ? asset('storage/' . $record->hero_image) : null),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hand_over_list')
                    ->label('Hand Over Items')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) : 0)
                    ->sortable(),
                Tables\Columns\TextColumn::make('get_back_list')
                    ->label('Get Back Items')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) : 0)
                    ->sortable(),
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
            'index' => \App\Filament\Resources\ProfessionalAudienceResource\Pages\ListProfessionalAudiences::route('/'),
            'create' => \App\Filament\Resources\ProfessionalAudienceResource\Pages\CreateProfessionalAudience::route('/create'),
            'edit' => \App\Filament\Resources\ProfessionalAudienceResource\Pages\EditProfessionalAudience::route('/{record}/edit'),
        ];
    }
}
