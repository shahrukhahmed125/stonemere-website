<?php

namespace App\Filament\Resources\PricingItemResource\Pages;

use App\Filament\Resources\PricingItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPricingItems extends ListRecords
{
    protected static string $resource = PricingItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
