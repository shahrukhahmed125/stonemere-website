<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnquiryResource\Pages;
use App\Models\Enquiry;
use Filament\Infolists;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class EnquiryResource extends Resource
{
    protected static ?string $model = Enquiry::class;

    protected static ?string $navigationLabel = 'Enquiries';

    protected static ?int $navigationSort = 1;

    protected static string | \UnitEnum | null $navigationGroup = 'Enquiries';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-inbox';

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Enquiry Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('name')
                            ->label('Name'),
                        Infolists\Components\TextEntry::make('phone')
                            ->label('Phone'),
                        Infolists\Components\TextEntry::make('organisation')
                            ->label('Organisation')
                            ->placeholder('—'),
                        Infolists\Components\TextEntry::make('role')
                            ->label('Role')
                            ->placeholder('—'),
                        Infolists\Components\TextEntry::make('message')
                            ->label('Message')
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('ip_address')
                            ->label('IP Address')
                            ->placeholder('—'),
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Received')
                            ->dateTime('d M Y, H:i'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('organisation')
                    ->label('Organisation')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('role')
                    ->label('Role')
                    ->badge()
                    ->color('gray')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('message')
                    ->label('Message')
                    ->limit(60)
                    ->wrap(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEnquiries::route('/'),
            'view' => Pages\ViewEnquiry::route('/{record}'),
        ];
    }
}
