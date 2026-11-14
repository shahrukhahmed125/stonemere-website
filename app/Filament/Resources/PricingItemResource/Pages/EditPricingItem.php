<?php

namespace App\Filament\Resources\PricingItemResource\Pages;

use App\Filament\Resources\PricingItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPricingItem extends EditRecord
{
    protected static string $resource = PricingItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
