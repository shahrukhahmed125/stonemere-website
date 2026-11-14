<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['content_json'] = json_encode($data['content'] ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $decoded = json_decode($data['content_json'] ?? '[]', true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
            throw \Illuminate\Validation\ValidationException::withMessages(['content_json' => 'Invalid JSON. Please fix the syntax and try again.']);
        }
        $data['content'] = $decoded;
        unset($data['content_json']);
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
