<?php

namespace App\Filament\Clusters\Home\Resources\ProductFeatureResource\Pages;

use App\Filament\Clusters\Home\Resources\ProductFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductFeature extends CreateRecord
{
    protected static string $resource = ProductFeatureResource::class;
}
