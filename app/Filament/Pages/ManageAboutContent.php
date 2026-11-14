<?php

namespace App\Filament\Pages;

use App\Models\AboutContent;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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
class ManageAboutContent extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'About Page';

    protected static ?int $navigationSort = 1;

    protected static string | UnitEnum | null $navigationGroup = 'Pages';

    protected string $view = 'filament.pages.manage-about-content';

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
                            TextInput::make('hero_title')->label('Title')->required()->maxLength(500)->helperText('Supports HTML (e.g., <em>)'),
                            Textarea::make('hero_lead')->label('Lead')->required()->rows(3)->maxLength(1000)->columnSpanFull(),
                            Grid::make(2)->schema([
                                TextInput::make('hero_cta_text')->label('CTA Text')->required()->maxLength(100),
                                TextInput::make('hero_cta_url')->label('CTA URL')->required()->maxLength(500)->rule(new \App\Rules\SafeUrl()),
                            ]),
                        ]),

                    Section::make('Definition')
                        ->schema([
                            TextInput::make('define_word')->label('Word')->required()->maxLength(255),
                            TextInput::make('define_phonetic')->label('Phonetic')->maxLength(255),
                            Textarea::make('define_definition')->label('Definition')->rows(2)->maxLength(1000)->columnSpanFull(),
                            Textarea::make('define_body')->label('Body')->rows(4)->maxLength(2000)->columnSpanFull(),
                        ]),

                    Section::make('Is / Is Not Columns')
                        ->schema([
                            Repeater::make('isnot_columns')
                                ->label('Columns')
                                ->schema([
                                    TextInput::make('label')->label('Label')->required()->maxLength(255),
                                    Textarea::make('text')->label('Text')->required()->rows(2)->maxLength(1000),
                                    Toggle::make('is_key')->label('Highlight as "is" column'),
                                ])
                                ->columns(1)
                                ->defaultItems(3)
                                ->addActionLabel('Add Column')
                                ->reorderable(),
                        ])
                        ->columnSpanFull(),

                    Section::make('Principles')
                        ->schema([
                            TextInput::make('principles_eyebrow')->label('Eyebrow')->required()->maxLength(100),
                            TextInput::make('principles_title')->label('Title')->required()->maxLength(500),
                            Repeater::make('principles_items')
                                ->label('Principles')
                                ->schema([
                                    TextInput::make('title')->label('Title')->required()->maxLength(255),
                                    TextInput::make('text')->label('Text')->required()->maxLength(500),
                                ])
                                ->columns(1)
                                ->defaultItems(5)
                                ->addActionLabel('Add Principle')
                                ->reorderable(),
                        ])
                        ->columnSpanFull(),

                    Section::make('Where We Work')
                        ->schema([
                            TextInput::make('where_eyebrow')->label('Eyebrow')->required()->maxLength(100),
                            TextInput::make('where_title')->label('Title')->required()->maxLength(500),
                            Textarea::make('where_text')->label('Text')->required()->rows(3)->maxLength(1000)->columnSpanFull(),
                        ]),

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
            ->title('About page content saved successfully')
            ->send();
    }

    public function getRecord(): AboutContent
    {
        return AboutContent::current();
    }
}
