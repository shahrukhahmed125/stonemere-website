<?php

namespace App\Filament\Resources\ServiceAreaResource\Pages;

use App\Filament\Resources\ServiceAreaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServiceArea extends EditRecord
{
    protected static string $resource = ServiceAreaResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['page_content_json'] = json_encode($data['page_content'] ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $decoded = json_decode($data['page_content_json'] ?? '[]', true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
            throw \Illuminate\Validation\ValidationException::withMessages(['page_content_json' => 'Invalid JSON. Please fix the syntax and try again.']);
        }
        $data['page_content'] = $decoded;
        unset($data['page_content_json']);
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
