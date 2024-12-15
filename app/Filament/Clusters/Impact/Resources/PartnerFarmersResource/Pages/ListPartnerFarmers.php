<?php

namespace App\Filament\Clusters\Impact\Resources\PartnerFarmersResource\Pages;

use App\Filament\Clusters\Impact\Resources\PartnerFarmersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartnerFarmers extends ListRecords
{
    protected static string $resource = PartnerFarmersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
