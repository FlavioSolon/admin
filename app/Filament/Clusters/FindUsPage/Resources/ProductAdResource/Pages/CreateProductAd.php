<?php

namespace App\Filament\Clusters\FindUsPage\Resources\ProductAdResource\Pages;

use App\Filament\Clusters\FindUsPage\Resources\ProductAdResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductAd extends CreateRecord
{
    protected static string $resource = ProductAdResource::class;
}
