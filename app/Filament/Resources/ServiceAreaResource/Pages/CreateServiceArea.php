<?php

namespace App\Filament\Resources\ServiceAreaResource\Pages;

use App\Filament\Resources\ServiceAreaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceArea extends CreateRecord
{
    protected static string $resource = ServiceAreaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $decoded = json_decode($data['page_content_json'] ?? '[]', true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
            throw \Illuminate\Validation\ValidationException::withMessages(['page_content_json' => 'Invalid JSON. Please fix the syntax and try again.']);
        }
        $data['page_content'] = $decoded;
        unset($data['page_content_json']);
        return $data;
    }
}
