<?php

namespace App\Filament\Resources;

use App\Models\SiteSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

class SiteSettingsResource extends Resource
{
    protected static ?string $model = SiteSettings::class;

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('General Information')
                    ->schema([
                        Forms\Components\TextInput::make('company_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tagline')
                            ->maxLength(255),
                    ]),

                \Filament\Schemas\Components\Section::make('Logos & Branding')
                    ->schema([
                        Forms\Components\TextInput::make('logo_light')
                            ->label('Light Logo Path')
                            ->placeholder('assets/images/brand/stonemere-logo.svg')
                            ->helperText('Path to light version of logo'),
                        Forms\Components\TextInput::make('logo_dark')
                            ->label('Dark Logo Path')
                            ->placeholder('assets/images/brand/stonemere-logo-mono-dark.svg')
                            ->helperText('Path to dark version of logo'),
                        Forms\Components\TextInput::make('logo_stacked')
                            ->label('Stacked Logo Path')
                            ->placeholder('assets/images/brand/stonemere-logo-stacked.svg')
                            ->helperText('Path to stacked version of logo'),
                        Forms\Components\TextInput::make('logo_stacked_reverse')
                            ->label('Stacked Reverse Logo Path')
                            ->placeholder('assets/images/brand/stonemere-logo-stacked-reverse.svg')
                            ->helperText('Path to stacked reverse version of logo'),
                        Forms\Components\TextInput::make('favicon')
                            ->label('Favicon Path')
                            ->placeholder('assets/images/favicon.svg')
                            ->helperText('Path to favicon'),
                    ]),

                \Filament\Schemas\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('whatsapp')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->rows(3),
                        Forms\Components\Textarea::make('business_hours')
                            ->rows(3),
                    ]),

                \Filament\Schemas\Components\Section::make('Social Media')
                    ->schema([
                        Forms\Components\TextInput::make('social_media.linkedin')
                            ->label('LinkedIn URL')
                            ->url()
                            ->prefix('https://linkedin.com/'),
                        Forms\Components\TextInput::make('social_media.twitter')
                            ->label('Twitter/X URL')
                            ->url()
                            ->prefix('https://twitter.com/'),
                        Forms\Components\TextInput::make('social_media.facebook')
                            ->label('Facebook URL')
                            ->url()
                            ->prefix('https://facebook.com/'),
                    ]),

                \Filament\Schemas\Components\Section::make('SEO Defaults')
                    ->schema([
                        Forms\Components\TextInput::make('default_meta_title')
                            ->label('Default Meta Title')
                            ->maxLength(255)
                            ->helperText('Used as fallback for pages without custom meta titles'),
                        Forms\Components\Textarea::make('default_meta_description')
                            ->label('Default Meta Description')
                            ->rows(3)
                            ->helperText('Used as fallback for pages without custom meta descriptions'),
                        Forms\Components\TextInput::make('default_og_image')
                            ->label('Default Open Graph Image')
                            ->placeholder('assets/images/og-default.jpg')
                            ->helperText('Path to default social sharing image'),
                        Forms\Components\TextInput::make('default_twitter_image')
                            ->label('Default Twitter Image')
                            ->placeholder('assets/images/twitter-default.jpg')
                            ->helperText('Path to default Twitter card image'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')
                    ->label('Company Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Prevent bulk actions for single-record resource
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\SiteSettingsResource\Pages\ListSiteSettings::route('/'),
            'edit' => \App\Filament\Resources\SiteSettingsResource\Pages\EditSiteSettings::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        // Prevent creation of duplicate settings records
        return SiteSettings::count() === 0;
    }
}
