<?php

namespace App\Filament\Resources\ProfessionalAudienceResource\Pages;

use App\Filament\Resources\ProfessionalAudienceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfessionalAudience extends EditRecord
{
    protected static string $resource = ProfessionalAudienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
