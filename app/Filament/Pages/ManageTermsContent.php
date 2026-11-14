<?php

namespace App\Filament\Pages;

use App\Models\TermsContent;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions as SchemaActions;
use Filament\Schemas\Components\Form;
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
                    Section::make('Page Header')
                        ->description('Main page heading and last revision date.')
                        ->schema([
                            TextInput::make('hero_title')
                                ->label('Page Title / Heading')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('last_updated')
                                ->label('Last Updated Date')
                                ->placeholder('Last updated: November 2026')
                                ->required()
                                ->maxLength(100),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Website Terms Content')
                        ->description('The full terms of use body. Use headings (H2/H3), paragraphs and lists to structure it — each H2 becomes a table-of-contents entry on the page.')
                        ->schema([
                            RichEditor::make('content')
                                ->label('Document Content')
                                ->required()
                                ->toolbarButtons([
                                    'bold',
                                    'italic',
                                    'underline',
                                    'strike',
                                    'h2',
                                    'h3',
                                    'bulletList',
                                    'orderedList',
                                    'link',
                                    'undo',
                                    'redo',
                                ])
                                ->columnSpanFull(),
                        ])
                        ->columnSpanFull(),

                    Section::make('Search Engine Optimization (SEO) & Social Sharing')
                        ->description('Manage how the terms page appears on search engines and social media.')
                        ->schema([
                            TextInput::make('meta_title')
                                ->label('Meta Title')
                                ->placeholder('Website Terms | Stonemere Life Management')
                                ->maxLength(255)
                                ->helperText('Recommended length: 50-60 characters.'),
                            TextInput::make('meta_keywords')
                                ->label('Meta Keywords')
                                ->maxLength(255),
                            Textarea::make('meta_description')
                                ->label('Meta Description')
                                ->rows(3)
                                ->maxLength(500)
                                ->helperText('Recommended length: 150-160 characters.')
                                ->columnSpanFull(),
                            TextInput::make('og_title')
                                ->label('Social Share Title (OG / Twitter)')
                                ->maxLength(255)
                                ->helperText('Leave blank to use the Meta Title.'),
                            FileUpload::make('og_image')
                                ->label('Social Share Image (OG Image)')
                                ->image()
                                ->disk('public')
                                ->directory('seo')
                                ->visibility('public')
                                ->helperText('Recommended size: 1200x630 pixels.'),
                            Textarea::make('og_description')
                                ->label('Social Share Description (OG / Twitter)')
                                ->rows(2)
                                ->maxLength(500)
                                ->helperText('Leave blank to use the Meta Description.')
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
