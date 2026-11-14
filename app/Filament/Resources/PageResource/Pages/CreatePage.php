<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $decoded = json_decode($data['content_json'] ?? '[]', true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
            throw \Illuminate\Validation\ValidationException::withMessages(['content_json' => 'Invalid JSON. Please fix the syntax and try again.']);
        }
        $data['content'] = $decoded;
        unset($data['content_json']);
        return $data;
    }
}
