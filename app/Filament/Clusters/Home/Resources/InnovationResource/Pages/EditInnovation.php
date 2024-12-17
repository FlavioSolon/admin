<?php

namespace App\Filament\Clusters\Home\Resources\InnovationResource\Pages;

use App\Filament\Clusters\Home\Resources\InnovationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInnovation extends EditRecord
{
    protected static string $resource = InnovationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
