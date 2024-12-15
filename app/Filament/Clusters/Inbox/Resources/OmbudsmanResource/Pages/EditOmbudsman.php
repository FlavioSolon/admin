<?php

namespace App\Filament\Clusters\Inbox\Resources\OmbudsmanResource\Pages;

use App\Filament\Clusters\Inbox\Resources\OmbudsmanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOmbudsman extends EditRecord
{
    protected static string $resource = OmbudsmanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
