<?php

namespace App\Filament\Resources\SiteSettingsResource\Pages;

use App\Filament\Resources\SiteSettingsResource;
use App\Models\SiteSettings;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiteSettings extends ListRecords
{
    protected static string $resource = SiteSettingsResource::class;

    protected function getHeaderActions(): array
    {
        $settings = SiteSettings::first();

        if ($settings) {
            return [
                Actions\Action::make('edit')
                    ->label('Edit Settings')
                    ->url(SiteSettingsResource::getUrl('edit', ['record' => $settings->id]))
                    ->icon('heroicon-o-pencil'),
            ];
        }

        return [
            Actions\CreateAction::make(),
        ];
    }
}
