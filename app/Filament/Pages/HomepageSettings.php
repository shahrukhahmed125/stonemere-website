<?php

namespace App\Filament\Pages;

use App\Models\Page;
use App\Rules\SafeUrl;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Pages\Page as FilamentPage;
use Filament\Schemas\Schema;

class HomepageSettings extends FilamentPage
{
    protected static ?string $navigationLabel = 'Homepage';

    protected static ?int $navigationSort = 0;

    protected string $view = 'filament.pages.homepage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $page = Page::where('slug', 'home')->first();
        
        if ($page) {
            $this->form->fill([
                'title' => $page->title,
                'meta_title' => $page->meta_title,
                'meta_description' => $page->meta_description,
                'content' => $page->content ?? [],
            ]);
        }
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
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
                    ]),

                \Filament\Schemas\Components\Section::make('Hero Section')
                    ->schema([
                        Forms\Components\TextInput::make('content.hero.title')
                            ->label('Hero Title')
                            ->required()
                            ->maxLength(500)
                            ->helperText('Supports HTML (e.g., <em> for italic)'),
                        Forms\Components\Textarea::make('content.hero.lead')
                            ->label('Hero Lead Text')
                            ->required()
                            ->rows(3)
                            ->maxLength(1000),
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('content.hero.cta_primary.text')
                                    ->label('Primary CTA Text')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('content.hero.cta_primary.url')
                                    ->label('Primary CTA URL')
                                    ->required()
                                    ->maxLength(500)
                                    ->rule(new SafeUrl()),
                                Forms\Components\TextInput::make('content.hero.cta_secondary.text')
                                    ->label('Secondary CTA Text')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('content.hero.cta_secondary.url')
                                    ->label('Secondary CTA URL')
                                    ->required()
                                    ->maxLength(500)
                                    ->rule(new SafeUrl()),
                            ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Strap Section')
                    ->schema([
                        Forms\Components\Textarea::make('content.strap.text')
                            ->label('Marquee Text')
                            ->required()
                            ->rows(2)
                            ->maxLength(500)
                            ->helperText('Use ◆ for separators'),
                    ]),

                \Filament\Schemas\Components\Section::make('Statement Section')
                    ->schema([
                        Forms\Components\TextInput::make('content.statement.eyebrow')
                            ->label('Eyebrow Text')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('content.statement.title')
                            ->label('Statement Title')
                            ->required()
                            ->maxLength(500)
                            ->helperText('Supports HTML (e.g., <em> for italic)'),
                        Forms\Components\Repeater::make('content.statement.paragraphs')
                            ->label('Paragraphs')
                            ->schema([
                                Forms\Components\Textarea::make('text')
                                    ->label('Paragraph')
                                    ->required()
                                    ->rows(3)
                                    ->maxLength(1000),
                            ])
                            ->columns(1)
                            ->defaultItems(2)
                            ->addActionLabel('Add Paragraph'),
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('content.statement.link_text')
                                    ->label('Link Text')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('content.statement.link_url')
                                    ->label('Link URL')
                                    ->required()
                                    ->maxLength(500)
                                    ->rule(new SafeUrl()),
                            ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Keystone Section')
                    ->schema([
                        Forms\Components\TextInput::make('content.keystone.eyebrow')
                            ->label('Eyebrow Text')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('content.keystone.title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Repeater::make('content.keystone.captions')
                            ->label('Captions')
                            ->schema([
                                Forms\Components\Textarea::make('text')
                                    ->label('Caption Text')
                                    ->required()
                                    ->rows(2)
                                    ->maxLength(500)
                                    ->helperText('Supports HTML (e.g., <strong> for bold)'),
                            ])
                            ->columns(1)
                            ->defaultItems(3)
                            ->addActionLabel('Add Caption'),
                    ]),

                \Filament\Schemas\Components\Section::make('Track Section (Service Cards)')
                    ->schema([
                        Forms\Components\TextInput::make('content.track.eyebrow')
                            ->label('Eyebrow Text')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('content.track.title')
                            ->label('Title')
                            ->required()
                            ->maxLength(500)
                            ->helperText('Supports HTML (e.g., <em> for italic)'),
                        Forms\Components\Textarea::make('content.track.description')
                            ->label('Description')
                            ->required()
                            ->rows(2)
                            ->maxLength(500),
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('content.track.link_text')
                                    ->label('Link Text')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('content.track.link_url')
                                    ->label('Link URL')
                                    ->required()
                                    ->maxLength(500)
                                    ->rule(new SafeUrl()),
                            ]),
                        Forms\Components\Repeater::make('content.track.cards')
                            ->label('Service Cards')
                            ->schema([
                                \Filament\Schemas\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('number')
                                            ->label('Number')
                                            ->required()
                                            ->maxLength(10),
                                        Forms\Components\TextInput::make('title')
                                            ->label('Title')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\FileUpload::make('image')
                                            ->label('Card Image')
                                            ->image()
                                            ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/jpeg', 'image/webp'])
                                            ->disk('public')
                                            ->directory('homepage/cards')
                                            ->visibility('public')
                                            ->required()
                                            ->maxSize(2048)
                                            ->helperText('Upload SVG or image file'),
                                        Forms\Components\TextInput::make('url')
                                            ->label('Card URL')
                                            ->required()
                                            ->maxLength(500)
                                            ->rule(new SafeUrl()),
                                        Forms\Components\TextInput::make('service_area_slug')
                                            ->label('Service Area Slug')
                                            ->maxLength(255)
                                            ->helperText('Link to ServiceArea record'),
                                    ]),
                                Forms\Components\Textarea::make('line')
                                    ->label('Card Description')
                                    ->required()
                                    ->rows(2)
                                    ->maxLength(500),
                                Forms\Components\Repeater::make('items')
                                    ->label('List Items')
                                    ->schema([
                                        Forms\Components\TextInput::make('text')
                                            ->label('Item')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->columns(1)
                                    ->defaultItems(4)
                                    ->addActionLabel('Add Item'),
                            ])
                            ->columns(1)
                            ->defaultItems(4)
                            ->addActionLabel('Add Card')
                            ->reorderable()
                            ->collapsible(),
                    ]),

                \Filament\Schemas\Components\Section::make('Refer Section (Audience Cards)')
                    ->schema([
                        Forms\Components\TextInput::make('content.refer.eyebrow')
                            ->label('Eyebrow Text')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('content.refer.title')
                            ->label('Title')
                            ->required()
                            ->maxLength(500)
                            ->helperText('Supports HTML (e.g., <em> for italic)'),
                        Forms\Components\Repeater::make('content.refer.cards')
                            ->label('Audience Cards')
                            ->schema([
                                \Filament\Schemas\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('number')
                                            ->label('Number')
                                            ->required()
                                            ->maxLength(10),
                                        Forms\Components\TextInput::make('title')
                                            ->label('Title')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\FileUpload::make('preview_image')
                                            ->label('Preview Image')
                                            ->image()
                                            ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/jpeg', 'image/webp'])
                                            ->disk('public')
                                            ->directory('homepage/audiences')
                                            ->visibility('public')
                                            ->required()
                                            ->maxSize(2048)
                                            ->helperText('Upload SVG or image file'),
                                        Forms\Components\TextInput::make('audience_slug')
                                            ->label('Audience Slug')
                                            ->maxLength(255)
                                            ->helperText('Link to ProfessionalAudience record'),
                                    ]),
                                Forms\Components\Textarea::make('body')
                                    ->label('Body Text')
                                    ->required()
                                    ->rows(3)
                                    ->maxLength(1000),
                                \Filament\Schemas\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('link_text')
                                            ->label('Link Text')
                                            ->required()
                                            ->maxLength(100),
                                        Forms\Components\TextInput::make('link_url')
                                            ->label('Link URL')
                                            ->required()
                                            ->maxLength(500)
                                            ->rule(new SafeUrl()),
                                    ]),
                            ])
                            ->columns(1)
                            ->defaultItems(4)
                            ->addActionLabel('Add Card')
                            ->reorderable()
                            ->collapsible(),
                    ]),

                \Filament\Schemas\Components\Section::make('Mapper Section')
                    ->schema([
                        Forms\Components\TextInput::make('content.mapper.eyebrow')
                            ->label('Eyebrow Text')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('content.mapper.title')
                            ->label('Title')
                            ->required()
                            ->maxLength(500)
                            ->helperText('Supports HTML (e.g., <em> for italic)'),
                        Forms\Components\Textarea::make('content.mapper.description')
                            ->label('Description')
                            ->required()
                            ->rows(2)
                            ->maxLength(500),
                        Forms\Components\TextInput::make('content.mapper.count_text')
                            ->label('Count Text')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Text after the number (e.g., "parties selected...")'),
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('content.mapper.cta_text')
                                    ->label('CTA Button Text')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('content.mapper.cta_url')
                                    ->label('CTA Button URL')
                                    ->required()
                                    ->maxLength(500)
                                    ->rule(new SafeUrl()),
                            ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Steps Section')
                    ->schema([
                        Forms\Components\TextInput::make('content.steps.eyebrow')
                            ->label('Eyebrow Text')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('content.steps.title')
                            ->label('Title')
                            ->required()
                            ->maxLength(500)
                            ->helperText('Supports HTML (e.g., <em> for italic)'),
                        Forms\Components\Textarea::make('content.steps.description')
                            ->label('Description')
                            ->required()
                            ->rows(2)
                            ->maxLength(500),
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('content.steps.button_text')
                                    ->label('Button Text')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('content.steps.button_url')
                                    ->label('Button URL')
                                    ->required()
                                    ->maxLength(500)
                                    ->rule(new SafeUrl()),
                            ]),
                        Forms\Components\Repeater::make('content.steps.steps')
                            ->label('Steps')
                            ->schema([
                                \Filament\Schemas\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('number')
                                            ->label('Number')
                                            ->required()
                                            ->maxLength(10),
                                        Forms\Components\TextInput::make('title')
                                            ->label('Title')
                                            ->required()
                                            ->maxLength(255),
                                    ]),
                                Forms\Components\Textarea::make('text')
                                    ->label('Description')
                                    ->required()
                                    ->rows(2)
                                    ->maxLength(500),
                            ])
                            ->columns(1)
                            ->defaultItems(4)
                            ->addActionLabel('Add Step')
                            ->reorderable(),
                    ]),

                \Filament\Schemas\Components\Section::make('Bounds Section')
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('content.bounds.do.label')
                                    ->label('"We Do" Label')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('content.bounds.dont.label')
                                    ->label('"We Never" Label')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('content.bounds.do.big_text')
                                    ->label('"We Do" Big Text')
                                    ->required()
                                    ->rows(2)
                                    ->maxLength(500),
                                Forms\Components\Textarea::make('content.bounds.dont.big_text')
                                    ->label('"We Never" Big Text')
                                    ->required()
                                    ->rows(2)
                                    ->maxLength(500),
                                Forms\Components\Textarea::make('content.bounds.do.description')
                                    ->label('"We Do" Description')
                                    ->required()
                                    ->rows(3)
                                    ->maxLength(1000),
                                Forms\Components\Textarea::make('content.bounds.dont.description')
                                    ->label('"We Never" Description')
                                    ->required()
                                    ->rows(3)
                                    ->maxLength(1000),
                            ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Standards Section')
                    ->schema([
                        Forms\Components\TextInput::make('content.standards.title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Repeater::make('content.standards.items')
                            ->label('Standard Items')
                            ->schema([
                                Forms\Components\Select::make('icon')
                                    ->label('Icon')
                                    ->options([
                                        'shield' => 'Shield',
                                        'lock' => 'Lock',
                                        'scale' => 'Scale',
                                        'user' => 'User',
                                    ])
                                    ->required(),
                                Forms\Components\TextInput::make('strong')
                                    ->label('Strong Text')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('text')
                                    ->label('Description')
                                    ->required()
                                    ->maxLength(500),
                            ])
                            ->columns(1)
                            ->defaultItems(4)
                            ->addActionLabel('Add Item')
                            ->reorderable(),
                    ]),

                \Filament\Schemas\Components\Section::make('Where Section')
                    ->schema([
                        Forms\Components\TextInput::make('content.where.eyebrow')
                            ->label('Eyebrow Text')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('content.where.title')
                            ->label('Title')
                            ->required()
                            ->maxLength(500)
                            ->helperText('Supports HTML (e.g., <em> for italic)'),
                        Forms\Components\Textarea::make('content.where.description')
                            ->label('Description')
                            ->required()
                            ->rows(3)
                            ->maxLength(1000),
                        Forms\Components\Repeater::make('content.where.figures')
                            ->label('Figures')
                            ->schema([
                                Forms\Components\TextInput::make('label')
                                    ->label('Label')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('value')
                                    ->label('Value')
                                    ->required()
                                    ->maxLength(50),
                            ])
                            ->columns(1)
                            ->defaultItems(3)
                            ->addActionLabel('Add Figure'),
                    ]),

                \Filament\Schemas\Components\Section::make('Lead Section')
                    ->schema([
                        Forms\Components\TextInput::make('content.lead.eyebrow')
                            ->label('Eyebrow Text')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('content.lead.title')
                            ->label('Title')
                            ->required()
                            ->maxLength(500)
                            ->helperText('Supports HTML (e.g., <em> for italic)'),
                        Forms\Components\Textarea::make('content.lead.description')
                            ->label('Description')
                            ->required()
                            ->rows(3)
                            ->maxLength(1000),
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('content.lead.button_primary.text')
                                    ->label('Primary Button Text')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('content.lead.button_primary.url')
                                    ->label('Primary Button URL')
                                    ->required()
                                    ->maxLength(500)
                                    ->rule(new SafeUrl()),
                                Forms\Components\TextInput::make('content.lead.button_secondary.text')
                                    ->label('Secondary Button Text')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('content.lead.button_secondary.url')
                                    ->label('Secondary Button URL')
                                    ->required()
                                    ->maxLength(500)
                                    ->rule(new SafeUrl()),
                            ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Tiers Section')
                    ->schema([
                        Forms\Components\TextInput::make('content.tiers.eyebrow')
                            ->label('Eyebrow Text')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('content.tiers.title')
                            ->label('Title')
                            ->required()
                            ->maxLength(500)
                            ->helperText('Supports HTML (e.g., <em> for italic)'),
                        Forms\Components\Textarea::make('content.tiers.description')
                            ->label('Description')
                            ->required()
                            ->rows(3)
                            ->maxLength(1000),
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('content.tiers.link_text')
                                    ->label('Link Text')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('content.tiers.link_url')
                                    ->label('Link URL')
                                    ->required()
                                    ->maxLength(500)
                                    ->rule(new SafeUrl()),
                            ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Questions Section')
                    ->schema([
                        Forms\Components\TextInput::make('content.questions.eyebrow')
                            ->label('Eyebrow Text')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('content.questions.title')
                            ->label('Title')
                            ->required()
                            ->maxLength(500)
                            ->helperText('Supports HTML (e.g., <em> for italic)'),
                        Forms\Components\Textarea::make('content.questions.description')
                            ->label('Description')
                            ->required()
                            ->rows(2)
                            ->maxLength(500),
                    ]),

                \Filament\Schemas\Components\Section::make('Contact Block Section')
                    ->schema([
                        Forms\Components\TextInput::make('content.contact.eyebrow')
                            ->label('Eyebrow Text')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('content.contact.title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('content.contact.description')
                            ->label('Description')
                            ->required()
                            ->rows(3)
                            ->maxLength(1000),
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('content.contact.office_bath.label')
                                    ->label('Bath Office Label')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('content.contact.office_bath.note')
                                    ->label('Bath Office Note')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('content.contact.office_bath.phone')
                                    ->label('Bath Office Phone')
                                    ->required()
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('content.contact.office_whatsapp.label')
                                    ->label('WhatsApp Office Label')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('content.contact.office_whatsapp.phone')
                                    ->label('WhatsApp Office Phone')
                                    ->required()
                                    ->maxLength(50),
                            ]),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        
        $page = Page::where('slug', 'home')->first();
        
        if ($page) {
            $page->update([
                'title' => $data['title'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'content' => $data['content'],
            ]);
            
            $this->notify('success', 'Homepage settings saved successfully.');
        } else {
            $this->notify('danger', 'Homepage page not found.');
        }
    }
}
