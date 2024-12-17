<?php

namespace App\Filament\Clusters\Home\Resources\ProductFeatureResource\Pages;

use App\Filament\Clusters\Home\Resources\ProductFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductFeature extends EditRecord
{
    protected static string $resource = ProductFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
