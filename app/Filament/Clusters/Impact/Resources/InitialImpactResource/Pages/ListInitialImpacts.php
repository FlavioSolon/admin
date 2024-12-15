<?php

namespace App\Filament\Clusters\Impact\Resources\InitialImpactResource\Pages;

use App\Filament\Clusters\Impact\Resources\InitialImpactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInitialImpacts extends ListRecords
{
    protected static string $resource = InitialImpactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
