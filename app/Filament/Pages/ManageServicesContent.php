<?php

namespace App\Filament\Pages;

use App\Models\ServicesContent;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions as SchemaActions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class ManageServicesContent extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationLabel = 'Services Page Content';

    protected static ?int $navigationSort = 3;

    protected static string | UnitEnum | null $navigationGroup = 'Services';

    protected string $view = 'filament.pages.manage-services-content';

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
                    Section::make('Hero Section')
                        ->description('Top banner with the main page heading and intro lead.')
                        ->schema([
                            TextInput::make('hero_eyebrow')
                                ->label('Eyebrow')
                                ->required()
                                ->maxLength(100),
                            TextInput::make('hero_title')
                                ->label('Hero Title')
                                ->required()
                                ->maxLength(500)
                                ->helperText('Supports HTML (e.g., <em> for italic)'),
                            Textarea::make('hero_lead')
                                ->label('Hero Lead')
                                ->required()
                                ->rows(3)
                                ->maxLength(1000)
                                ->columnSpanFull(),
                            Grid::make(2)
                                ->schema([
                                    TextInput::make('hero_cta_primary_text')
                                        ->label('Primary CTA Text')
                                        ->required()
                                        ->maxLength(100),
                                    TextInput::make('hero_cta_primary_url')
                                        ->label('Primary CTA URL')
                                        ->required()
                                        ->maxLength(500)
                                        ->rule(new \App\Rules\SafeUrl()),
                                    TextInput::make('hero_cta_secondary_text')
                                        ->label('Secondary CTA Text')
                                        ->required()
                                        ->maxLength(100),
                                    TextInput::make('hero_cta_secondary_url')
                                        ->label('Secondary CTA URL')
                                        ->required()
                                        ->maxLength(500)
                                        ->rule(new \App\Rules\SafeUrl()),
                                ]),
                        ])
                        ->columnSpanFull(),

                    Section::make('CTA Section')
                        ->description('The call to action band at the bottom of the page.')
                        ->schema([
                            TextInput::make('cta_eyebrow')
                                ->label('Eyebrow')
                                ->required()
                                ->maxLength(100),
                            TextInput::make('cta_title')
                                ->label('CTA Title')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('cta_text')
                                ->label('CTA Text')
                                ->required()
                                ->rows(2)
                                ->maxLength(500)
                                ->columnSpanFull(),
                            Grid::make(2)
                                ->schema([
                                    TextInput::make('cta_button_primary_text')
                                        ->label('Primary Button Text')
                                        ->required()
                                        ->maxLength(100),
                                    TextInput::make('cta_button_primary_url')
                                        ->label('Primary Button URL')
                                        ->required()
                                        ->maxLength(500)
                                        ->rule(new \App\Rules\SafeUrl()),
                                    TextInput::make('cta_button_secondary_text')
                                        ->label('Secondary Button Text')
                                        ->required()
                                        ->maxLength(100),
                                    TextInput::make('cta_button_secondary_url')
                                        ->label('Secondary Button URL')
                                        ->required()
                                        ->maxLength(500)
                                        ->rule(new \App\Rules\SafeUrl()),
                                ]),
                        ])
                        ->columnSpanFull(),

                    Section::make('Search Engine Optimization (SEO) & Social Sharing')
                        ->description('Manage how the services page appears on search engines and social media.')
                        ->schema([
                            TextInput::make('meta_title')
                                ->label('Meta Title')
                                ->maxLength(255)
                                ->helperText('Recommended length: 50-60 characters'),
                            TextInput::make('meta_keywords')
                                ->label('Meta Keywords')
                                ->maxLength(255),
                            Textarea::make('meta_description')
                                ->label('Meta Description')
                                ->rows(3)
                                ->maxLength(500)
                                ->helperText('Recommended length: 150-160 characters')
                                ->columnSpanFull(),
                            TextInput::make('og_title')
                                ->label('Social Share Title (OG / Twitter)')
                                ->maxLength(255)
                                ->helperText('Leave blank to use the Meta Title'),
                            FileUpload::make('og_image')
                                ->label('Social Share Image (OG Image)')
                                ->image()
                                ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp'])
                                ->disk('public')
                                ->directory('seo')
                                ->visibility('public')
                                ->maxSize(4096)
                                ->helperText('Recommended size: 1200x630 pixels'),
                            Textarea::make('og_description')
                                ->label('Social Share Description (OG / Twitter)')
                                ->rows(2)
                                ->maxLength(500)
                                ->helperText('Leave blank to use the Meta Description')
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),
                ])
                    ->livewireSubmitHandler('save')
                    ->footer([
                        SchemaActions::make([
                            Action::make('save')
                                ->label('Save Content')
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
            $record = new ServicesContent();
            $record->id = 1;
        }

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Services page content saved successfully')
            ->send();
    }

    public function getRecord(): ?ServicesContent
    {
        return ServicesContent::current();
    }
}
