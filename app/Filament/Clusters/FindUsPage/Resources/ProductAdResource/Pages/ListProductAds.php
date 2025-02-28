<?php

namespace App\Filament\Clusters\FindUsPage\Resources\ProductAdResource\Pages;

use App\Filament\Clusters\FindUsPage\Resources\ProductAdResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductAds extends ListRecords
{
    protected static string $resource = ProductAdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
