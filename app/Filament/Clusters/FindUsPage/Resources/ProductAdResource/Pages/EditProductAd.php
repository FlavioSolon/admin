<?php

namespace App\Filament\Clusters\FindUsPage\Resources\ProductAdResource\Pages;

use App\Filament\Clusters\FindUsPage\Resources\ProductAdResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductAd extends EditRecord
{
    protected static string $resource = ProductAdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
