<?php

namespace App\Filament\Clusters\Impact\Resources\OurImpactResource\Pages;

use App\Filament\Clusters\Impact\Resources\OurImpactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOurImpacts extends ListRecords
{
    protected static string $resource = OurImpactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
