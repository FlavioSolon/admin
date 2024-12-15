<?php

namespace App\Filament\Clusters\Home\Resources\ProductResource\Pages;

use App\Filament\Clusters\Home\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
}
