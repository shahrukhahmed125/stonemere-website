<?php

namespace App\Filament\Pages;

use App\Models\ProfessionalsContent;
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
class ManageProfessionalsContent extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Professionals Page';

    protected static ?int $navigationSort = 5;

    protected static string | UnitEnum | null $navigationGroup = 'Pages';

    protected string $view = 'filament.pages.manage-professionals-content';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->getRecord()?->attributesToArray() ?? []);
    }

    public function form(Schema $schema): Schema
    {
        $optionRepeater = fn (string $name, string $label) => Repeater::make($name)
            ->label($label)
            ->schema([
                TextInput::make('value')->label('Value')->required()->maxLength(255),
                TextInput::make('label')->label('Label')->required()->maxLength(255),
            ])
            ->columns(1)
            ->defaultItems(1)
            ->addActionLabel('Add Option')
            ->reorderable();

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

                    Section::make('The Remit')
                        ->schema([
                            TextInput::make('remit_eyebrow')->label('Eyebrow')->required()->maxLength(100),
                            TextInput::make('remit_title')->label('Title')->required()->maxLength(500),
                            Textarea::make('remit_lede')->label('Lede')->required()->rows(3)->maxLength(1000)->columnSpanFull(),
                            Textarea::make('remit_body')->label('Body')->required()->rows(3)->maxLength(1000)->columnSpanFull(),
                        ])
                        ->columnSpanFull(),

                    Section::make('Referral Builder')
                        ->description('Options shown in the interactive referral builder on the page.')
                        ->schema([
                            TextInput::make('builder_eyebrow')->label('Eyebrow')->required()->maxLength(100),
                            TextInput::make('builder_title')->label('Title')->required()->maxLength(500),
                            Textarea::make('builder_intro')->label('Intro')->required()->rows(2)->maxLength(1000)->columnSpanFull(),
                            $optionRepeater('builder_referrer_options', 'Who is referring? Options'),
                            Repeater::make('builder_needs_groups')
                                ->label('Needs Groups')
                                ->schema([
                                    TextInput::make('label')->label('Group Label')->required()->maxLength(255),
                                    Repeater::make('options')
                                        ->label('Options')
                                        ->schema([
                                            TextInput::make('value')->label('Value')->required()->maxLength(255),
                                            TextInput::make('label')->label('Label')->required()->maxLength(255),
                                        ])
                                        ->columns(1)
                                        ->defaultItems(1)
                                        ->addActionLabel('Add Option')
                                        ->reorderable(),
                                ])
                                ->columns(1)
                                ->defaultItems(1)
                                ->addActionLabel('Add Group')
                                ->reorderable()
                                ->collapsible(),
                            $optionRepeater('builder_urgency_options', 'Urgency Options'),
                            $optionRepeater('builder_area_options', 'Area Options'),
                        ])
                        ->columnSpanFull(),

                    Section::make('FAQs')
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
            ->title('Professionals page content saved successfully')
            ->send();
    }

    public function getRecord(): ProfessionalsContent
    {
        return ProfessionalsContent::current();
    }
}
