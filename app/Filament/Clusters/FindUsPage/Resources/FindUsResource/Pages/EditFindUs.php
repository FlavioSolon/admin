<?php

namespace App\Filament\Clusters\FindUsPage\Resources\FindUsResource\Pages;

use App\Filament\Clusters\FindUsPage\Resources\FindUsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFindUs extends EditRecord
{
    protected static string $resource = FindUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
