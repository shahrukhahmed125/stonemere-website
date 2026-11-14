<?php

namespace App\Filament\Resources;

use App\Models\TeamMember;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static ?string $navigationLabel = 'Team Members';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Team Member Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('role')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Job title or role'),
                        Forms\Components\Textarea::make('bio')
                            ->rows(4)
                            ->maxLength(2000)
                            ->helperText('Biography or description'),
                        Forms\Components\FileUpload::make('photo')
                            ->label('Profile Photo')
                            ->image()
                            ->directory('team-photos')
                            ->visibility('public')
                            ->imagePreviewHeight('150')
                            ->helperText('Upload a profile photo'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('whatsapp')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('linkedin')
                            ->url()
                            ->maxLength(255)
                            ->helperText('LinkedIn profile URL'),
                        Forms\Components\TextInput::make('sort_order')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->helperText('Display order'),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Photo')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => $record->photo ? asset('storage/' . $record->photo) : null),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('Role')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
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
            'index' => \App\Filament\Resources\TeamMemberResource\Pages\ListTeamMembers::route('/'),
            'create' => \App\Filament\Resources\TeamMemberResource\Pages\CreateTeamMember::route('/create'),
            'edit' => \App\Filament\Resources\TeamMemberResource\Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
