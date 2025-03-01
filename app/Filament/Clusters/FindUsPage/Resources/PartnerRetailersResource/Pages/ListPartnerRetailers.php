<?php

namespace App\Filament\Clusters\FindUsPage\Resources\PartnerRetailersResource\Pages;

use App\Filament\Clusters\FindUsPage\Resources\PartnerRetailersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartnerRetailers extends ListRecords
{
    protected static string $resource = PartnerRetailersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
