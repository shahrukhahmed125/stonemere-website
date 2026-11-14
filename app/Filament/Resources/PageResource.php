<?php

namespace App\Filament\Resources;

use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationLabel = 'Pages';

    protected static ?int $navigationSort = 1;

    protected static string | \UnitEnum | null $navigationGroup = 'Pages';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Page Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('URL-friendly identifier (e.g., "about")'),
                        Forms\Components\TextInput::make('template_key')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->helperText('Blade template to use (e.g., "about")'),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ]),

                \Filament\Schemas\Components\Section::make('Page Content')
                    ->schema([
                        Forms\Components\Textarea::make('content_json')
                            ->label('Content (JSON)')
                            ->rows(14)
                            ->columnSpanFull()
                            ->dehydrated(false)
                            ->helperText('JSON structure powering this page. Edit carefully — invalid JSON will be rejected on save.'),
                    ]),

                \Filament\Schemas\Components\Section::make('SEO Settings')
                    ->schema([
                        Forms\Components\TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->maxLength(255)
                            ->helperText('Page title for search engines'),
                        Forms\Components\Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3)
                            ->helperText('Page description for search engines'),
                        Forms\Components\TextInput::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->maxLength(255)
                            ->helperText('Comma-separated keywords'),
                        Forms\Components\TextInput::make('canonical_url')
                            ->label('Canonical URL')
                            ->url()
                            ->helperText('Preferred URL for this page'),
                    ]),

                \Filament\Schemas\Components\Section::make('Open Graph Settings')
                    ->schema([
                        Forms\Components\TextInput::make('og_title')
                            ->label('OG Title')
                            ->maxLength(255)
                            ->helperText('Title for social media sharing'),
                        Forms\Components\Textarea::make('og_description')
                            ->label('OG Description')
                            ->rows(3)
                            ->helperText('Description for social media sharing'),
                        Forms\Components\TextInput::make('og_image')
                            ->label('OG Image')
                            ->placeholder('assets/images/og-about.jpg')
                            ->helperText('Path to social sharing image'),
                    ]),

                \Filament\Schemas\Components\Section::make('Twitter Card Settings')
                    ->schema([
                        Forms\Components\Select::make('twitter_card')
                            ->label('Twitter Card Type')
                            ->options([
                                'summary' => 'Summary',
                                'summary_large_image' => 'Summary with Large Image',
                                'app' => 'App',
                                'player' => 'Player',
                            ])
                            ->default('summary_large_image'),
                        Forms\Components\TextInput::make('twitter_image')
                            ->label('Twitter Image')
                            ->placeholder('assets/images/twitter-about.jpg')
                            ->helperText('Path to Twitter card image'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('template_key')
                    ->label('Template')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('meta_title')
                    ->label('Meta Title')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->limit(50),
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
            ->defaultSort('slug');
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\PageResource\Pages\ListPages::route('/'),
            'create' => \App\Filament\Resources\PageResource\Pages\CreatePage::route('/create'),
            'edit' => \App\Filament\Resources\PageResource\Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
