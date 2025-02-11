<?php

namespace App\Filament\Clusters\Home\Resources\InnovationResource\Pages;

use App\Filament\Clusters\Home\Resources\InnovationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInnovations extends ListRecords
{
    protected static string $resource = InnovationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
