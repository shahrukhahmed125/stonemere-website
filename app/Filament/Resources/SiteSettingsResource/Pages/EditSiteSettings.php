<?php

namespace App\Filament\Resources\SiteSettingsResource\Pages;

use App\Filament\Resources\SiteSettingsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiteSettings extends EditRecord
{
    protected static string $resource = SiteSettingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            // Delete action removed - model prevents deletion of the only settings record
        ];
    }
}
