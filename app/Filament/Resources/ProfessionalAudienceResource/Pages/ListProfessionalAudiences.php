<?php

namespace App\Filament\Resources\ProfessionalAudienceResource\Pages;

use App\Filament\Resources\ProfessionalAudienceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfessionalAudiences extends ListRecords
{
    protected static string $resource = ProfessionalAudienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
