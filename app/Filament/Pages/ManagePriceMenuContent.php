<?php

namespace App\Filament\Pages;

use App\Models\PriceMenuContent;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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
class ManagePriceMenuContent extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Price Menu Page';

    protected static ?int $navigationSort = 3;

    protected static string | UnitEnum | null $navigationGroup = 'Pages';

    protected string $view = 'filament.pages.manage-price-menu-content';

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
                    Section::make('Hero')
                        ->schema([
                            TextInput::make('hero_eyebrow')->label('Eyebrow')->required()->maxLength(100),
                            TextInput::make('hero_title')->label('Title')->required()->maxLength(500),
                            Textarea::make('hero_lead')->label('Lead')->required()->rows(3)->maxLength(1000)->columnSpanFull(),
                            Grid::make(2)->schema([
                                TextInput::make('hero_cta_primary_text')->label('Primary CTA Text')->required()->maxLength(100),
                                TextInput::make('hero_cta_primary_url')->label('Primary CTA URL')->required()->maxLength(500)->rule(new \App\Rules\SafeUrl()),
                                TextInput::make('hero_cta_secondary_text')->label('Secondary CTA Text')->required()->maxLength(100),
                                TextInput::make('hero_cta_secondary_url')->label('Secondary CTA URL')->required()->maxLength(500)->rule(new \App\Rules\SafeUrl()),
                            ]),
                        ]),

                    Section::make('Pricing Introduction')
                        ->schema([
                            TextInput::make('intro_eyebrow')->label('Eyebrow')->required()->maxLength(100),
                            TextInput::make('intro_title')->label('Title')->required()->maxLength(500),
                            Textarea::make('intro_text')->label('Text')->required()->rows(4)->maxLength(2000)->columnSpanFull(),
                        ])
                        ->columnSpanFull(),

                    Section::make('Pricing Table')
                        ->description('The services and prices shown in the table are managed under Website Content → Service Pricing.')
                        ->schema([
                            TextInput::make('table_eyebrow')->label('Eyebrow')->required()->maxLength(100),
                            TextInput::make('table_title')->label('Title')->required()->maxLength(500),
                        ]),

                    Section::make('How Additional Charges Work')
                        ->schema([
                            TextInput::make('charges_eyebrow')->label('Eyebrow')->required()->maxLength(100),
                            TextInput::make('charges_title')->label('Title')->required()->maxLength(500),
                            Repeater::make('charge_items')
                                ->label('Charge Blocks')
                                ->schema([
                                    \Filament\Forms\Components\Select::make('icon')
                                        ->label('Icon')
                                        ->options([
                                            'i-pin' => 'Pin / Location',
                                            'i-keystone' => 'Keystone',
                                            'i-scale' => 'Scale',
                                            'i-user' => 'User',
                                            'i-lock' => 'Lock',
                                            'i-check' => 'Check',
                                            'i-clock' => 'Clock',
                                            'i-shield' => 'Shield',
                                            'i-phone' => 'Phone',
                                            'i-mail' => 'Mail',
                                        ])
                                        ->default('i-check'),
                                    TextInput::make('title')->label('Title')->required()->maxLength(255),
                                    Textarea::make('text')->label('Text')->required()->rows(4)->maxLength(3000)
                                        ->helperText('Separate paragraphs with a blank line.'),
                                ])
                                ->columns(1)
                                ->defaultItems(5)
                                ->addActionLabel('Add Block')
                                ->reorderable()
                                ->collapsible(),
                        ])
                        ->columnSpanFull(),

                    Section::make('Agreement Before Work Starts')
                        ->schema([
                            TextInput::make('agreement_eyebrow')->label('Eyebrow')->required()->maxLength(100),
                            TextInput::make('agreement_title')->label('Title')->required()->maxLength(500),
                            Textarea::make('agreement_text')->label('Text')->required()->rows(4)->maxLength(2000)
                                ->helperText('Separate paragraphs with a blank line.')
                                ->columnSpanFull(),
                        ])
                        ->columnSpanFull(),

                    Section::make('Pricing FAQs')
                        ->schema([
                            TextInput::make('faqs_eyebrow')->label('Eyebrow')->required()->maxLength(100),
                            TextInput::make('faqs_title')->label('Title')->required()->maxLength(500),
                            Repeater::make('faqs_items')
                                ->label('Questions')
                                ->schema([
                                    TextInput::make('question')->label('Question')->required()->maxLength(255),
                                    Textarea::make('answer')->label('Answer')->required()->rows(2)->maxLength(1000),
                                ])
                                ->columns(1)
                                ->defaultItems(4)
                                ->addActionLabel('Add Question')
                                ->reorderable()
                                ->collapsible(),
                        ])
                        ->columnSpanFull(),

                    Section::make('CTA Band')
                        ->schema([
                            TextInput::make('cta_eyebrow')->label('Eyebrow')->required()->maxLength(100),
                            TextInput::make('cta_title')->label('Title')->required()->maxLength(255),
                            Textarea::make('cta_text')->label('Text')->required()->rows(2)->maxLength(500)->columnSpanFull(),
                            Grid::make(2)->schema([
                                TextInput::make('cta_button_primary_text')->label('Primary Button Text')->required()->maxLength(100),
                                TextInput::make('cta_button_primary_url')->label('Primary Button URL')->required()->maxLength(500)->rule(new \App\Rules\SafeUrl()),
                                TextInput::make('cta_button_secondary_text')->label('Secondary Button Text')->required()->maxLength(100),
                                TextInput::make('cta_button_secondary_url')->label('Secondary Button URL')->required()->maxLength(500)->rule(new \App\Rules\SafeUrl()),
                            ]),
                        ])
                        ->columnSpanFull(),

                    Section::make('SEO & Social')
                        ->schema([
                            TextInput::make('meta_title')->label('Meta Title')->maxLength(255),
                            TextInput::make('meta_keywords')->label('Meta Keywords')->maxLength(255),
                            Textarea::make('meta_description')->label('Meta Description')->rows(2)->maxLength(500)->columnSpanFull(),
                            TextInput::make('og_title')->label('Social Share Title')->maxLength(255),
                            FileUpload::make('og_image')->label('Social Share Image')->image()->acceptedFileTypes(['image/png','image/jpeg','image/webp'])->disk('public')->directory('seo')->visibility('public')->maxSize(4096),
                            Textarea::make('og_description')->label('Social Share Description')->rows(2)->maxLength(500)->columnSpanFull(),
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
        $record->fill($data);
        $record->save();

        Notification::make()
            ->success()
            ->title('Price menu page content saved successfully')
            ->send();
    }

    public function getRecord(): PriceMenuContent
    {
        return PriceMenuContent::current();
    }
}
