<?php

namespace App\Filament\Pages;

use App\Models\TermsContent;
use BackedEnum;
use Filament\Actions\Action;
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
class ManageTermsContent extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Terms Page';

    protected static ?int $navigationSort = 7;

    protected static string | UnitEnum | null $navigationGroup = 'Pages';

    protected string $view = 'filament.pages.manage-terms-content';

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
                    Section::make('Document')
                        ->schema([
                            TextInput::make('doc_title')
                                ->label('Title')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('doc_date')
                                ->label('Date Line')
                                ->required()
                                ->maxLength(255)
                                ->helperText('e.g. "Last updated: November 2026"'),
                        ]),

                    Section::make('Sections')
                        ->description('Each section becomes a heading plus body on the page, and an entry in the table of contents.')
                        ->schema([
                            Repeater::make('sections')
                                ->label('Sections')
                                ->schema([
                                    Grid::make(2)->schema([
                                        TextInput::make('id')
                                            ->label('Anchor ID')
                                            ->required()
                                            ->maxLength(100)
                                            ->helperText('Used for the table-of-contents link (e.g. "who")'),
                                        TextInput::make('toc')
                                            ->label('TOC Label (optional)')
                                            ->maxLength(255)
                                            ->helperText('Leave blank to use the heading'),
                                    ]),
                                    TextInput::make('heading')
                                        ->label('Heading')
                                        ->required()
                                        ->maxLength(255),
                                    Textarea::make('html')
                                        ->label('Body HTML')
                                        ->required()
                                        ->rows(5)
                                        ->columnSpanFull()
                                        ->helperText('Basic HTML allowed: p, a, strong, em, ul, li'),
                                ])
                                ->columns(1)
                                ->defaultItems(1)
                                ->addActionLabel('Add Section')
                                ->reorderable()
                                ->collapsible(),
                        ])
                        ->columnSpanFull(),

                    Section::make('SEO & Social')
                        ->schema([
                            TextInput::make('meta_title')->label('Meta Title')->maxLength(255),
                            TextInput::make('meta_keywords')->label('Meta Keywords')->maxLength(255),
                            Textarea::make('meta_description')->label('Meta Description')->rows(2)->maxLength(500)->columnSpanFull(),
                            TextInput::make('og_title')->label('Social Share Title')->maxLength(255),
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
            ->title('Terms page content saved successfully')
            ->send();
    }

    public function getRecord(): TermsContent
    {
        return TermsContent::current();
    }
}
