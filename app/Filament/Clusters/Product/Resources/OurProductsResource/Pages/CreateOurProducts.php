<?php

namespace App\Filament\Clusters\Product\Resources\OurProductsResource\Pages;

use App\Filament\Clusters\Product\Resources\OurProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOurProducts extends CreateRecord
{
    protected static string $resource = OurProductsResource::class;
}
