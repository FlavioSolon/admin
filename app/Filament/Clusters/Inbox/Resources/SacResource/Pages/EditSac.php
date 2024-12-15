<?php

namespace App\Filament\Clusters\Inbox\Resources\SacResource\Pages;

use App\Filament\Clusters\Inbox\Resources\SacResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSac extends EditRecord
{
    protected static string $resource = SacResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
