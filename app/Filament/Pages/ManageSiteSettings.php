<?php

namespace App\Filament\Pages;

use App\Models\SiteSettings;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class ManageSiteSettings extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?int $navigationSort = 2;

    protected static string | UnitEnum | null $navigationGroup = 'Website Settings';

    protected string $view = 'filament.pages.manage-site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->getRecord()?->attributesToArray() ?? []);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    Section::make('General Information')
                        ->description('Your company details displayed throughout the website.')
                        ->schema([
                            TextInput::make('company_name')
                                ->label('Company Name')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('tagline')
                                ->label('Tagline')
                                ->maxLength(255),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Logos & Branding')
                        ->description('Upload logo and favicon images.')
                        ->schema([
                            FileUpload::make('logo_light')
                                ->label('Light Logo')
                                ->image()
                                ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/jpeg', 'image/webp'])
                                ->disk('public')
                                ->directory('branding')
                                ->visibility('public')
                                ->maxSize(2048)
                                ->helperText('Logo shown on dark backgrounds (e.g. header on dark theme)'),
                            FileUpload::make('logo_dark')
                                ->label('Dark Logo')
                                ->image()
                                ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/jpeg', 'image/webp'])
                                ->disk('public')
                                ->directory('branding')
                                ->visibility('public')
                                ->maxSize(2048)
                                ->helperText('Logo shown on light backgrounds'),
                            FileUpload::make('logo_stacked')
                                ->label('Stacked Logo')
                                ->image()
                                ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/jpeg', 'image/webp'])
                                ->disk('public')
                                ->directory('branding')
                                ->visibility('public')
                                ->maxSize(2048)
                                ->helperText('Stacked logo variant'),
                            FileUpload::make('logo_stacked_reverse')
                                ->label('Stacked Reverse Logo')
                                ->image()
                                ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/jpeg', 'image/webp'])
                                ->disk('public')
                                ->directory('branding')
                                ->visibility('public')
                                ->maxSize(2048)
                                ->helperText('Stacked logo for dark backgrounds (footer)'),
                            FileUpload::make('favicon')
                                ->label('Favicon')
                                ->image()
                                ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/x-icon', 'image/vnd.microsoft.icon'])
                                ->disk('public')
                                ->directory('branding')
                                ->visibility('public')
                                ->maxSize(1024)
                                ->helperText('SVG or ICO favicon'),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Contact Information')
                        ->description('Contact details shown across the website.')
                        ->schema([
                            TextInput::make('phone')
                                ->label('Phone Number')
                                ->tel()
                                ->maxLength(255),
                            TextInput::make('whatsapp')
                                ->label('WhatsApp Number')
                                ->tel()
                                ->maxLength(255),
                            TextInput::make('email')
                                ->label('Email Address')
                                ->email()
                                ->maxLength(255)
                                ->helperText('Used for enquiry notifications'),
                            Textarea::make('address')
                                ->label('Address')
                                ->rows(2),
                            Textarea::make('business_hours')
                                ->label('Business Hours')
                                ->rows(2),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Social Media')
                        ->schema([
                            TextInput::make('social_media.linkedin')
                                ->label('LinkedIn URL')
                                ->url()
                                ->prefix('https://linkedin.com/'),
                            TextInput::make('social_media.twitter')
                                ->label('Twitter/X URL')
                                ->url()
                                ->prefix('https://twitter.com/'),
                            TextInput::make('social_media.facebook')
                                ->label('Facebook URL')
                                ->url()
                                ->prefix('https://facebook.com/'),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('SEO Defaults')
                        ->description('Fallback metadata used when a page has no custom SEO values.')
                        ->schema([
                            TextInput::make('default_meta_title')
                                ->label('Default Meta Title')
                                ->maxLength(255),
                            Textarea::make('default_meta_description')
                                ->label('Default Meta Description')
                                ->rows(3),
                            TextInput::make('default_og_image')
                                ->label('Default Open Graph Image')
                                ->placeholder('assets/images/og-default.jpg')
                                ->helperText('Path to default social sharing image'),
                            TextInput::make('default_twitter_image')
                                ->label('Default Twitter Image')
                                ->placeholder('assets/images/twitter-default.jpg')
                                ->helperText('Path to default Twitter card image'),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),
                ])
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make([
                            Action::make('save')
                                ->label('Save Settings')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ])
            ->record($this->getRecord())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $record = $this->getRecord();

        if (!$record) {
            $record = new SiteSettings();
            $record->id = 1;
        }

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Settings saved successfully')
            ->send();
    }

    public function getRecord(): ?SiteSettings
    {
        return SiteSettings::getSettings();
    }
}
