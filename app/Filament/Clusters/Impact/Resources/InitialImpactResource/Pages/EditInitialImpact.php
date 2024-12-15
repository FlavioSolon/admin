<?php

namespace App\Filament\Clusters\Impact\Resources\InitialImpactResource\Pages;

use App\Filament\Clusters\Impact\Resources\InitialImpactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInitialImpact extends EditRecord
{
    protected static string $resource = InitialImpactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
