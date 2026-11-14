<?php

namespace App\Filament\Pages;

use App\Models\ContactContent;
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
class ManageContactContent extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationLabel = 'Contact Page';

    protected static ?int $navigationSort = 4;

    protected static string | UnitEnum | null $navigationGroup = 'Pages';

    protected string $view = 'filament.pages.manage-contact-content';

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
                        ]),

                    Section::make('Contact Route Labels')
                        ->description('The actual phone numbers, WhatsApp and email are managed in Website Settings → Site Settings.')
                        ->schema([
                            Grid::make(3)->schema([
                                TextInput::make('routes_whatsapp_label')->label('WhatsApp Label')->required()->maxLength(100),
                                TextInput::make('routes_phone_label')->label('Phone Label')->required()->maxLength(100),
                                TextInput::make('routes_area_label')->label('Area Label')->required()->maxLength(100),
                            ]),
                        ]),

                    Section::make('Referral Link')
                        ->schema([
                            TextInput::make('referral_prefix')->label('Prefix Text')->required()->maxLength(255),
                            TextInput::make('referral_link_text')->label('Link Text')->required()->maxLength(255),
                        ]),

                    Section::make('Enquiry Form')
                        ->schema([
                            TextInput::make('form_role_placeholder')->label('Role Field Placeholder')->required()->maxLength(255),
                            Repeater::make('form_role_options')
                                ->label('Role Options')
                                ->schema([
                                    TextInput::make('value')->label('Value (submitted)')->required()->maxLength(255),
                                    TextInput::make('label')->label('Label (shown)')->required()->maxLength(255),
                                ])
                                ->columns(1)
                                ->defaultItems(7)
                                ->addActionLabel('Add Option')
                                ->reorderable(),
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
            ->title('Contact page content saved successfully')
            ->send();
    }

    public function getRecord(): ContactContent
    {
        return ContactContent::current();
    }
}
