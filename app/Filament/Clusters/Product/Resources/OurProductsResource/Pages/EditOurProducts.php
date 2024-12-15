<?php

namespace App\Filament\Clusters\Product\Resources\OurProductsResource\Pages;

use App\Filament\Clusters\Product\Resources\OurProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurProducts extends EditRecord
{
    protected static string $resource = OurProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
