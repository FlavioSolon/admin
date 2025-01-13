<?php

namespace App\Filament\Clusters\FindUsPage\Resources\StoreLocationResource\Pages;

use App\Filament\Clusters\FindUsPage\Resources\StoreLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStoreLocations extends ListRecords
{
    protected static string $resource = StoreLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
