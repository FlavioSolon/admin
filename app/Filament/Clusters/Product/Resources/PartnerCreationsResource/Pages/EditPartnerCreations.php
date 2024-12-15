<?php

namespace App\Filament\Clusters\Product\Resources\PartnerCreationsResource\Pages;

use App\Filament\Clusters\Product\Resources\PartnerCreationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnerCreations extends EditRecord
{
    protected static string $resource = PartnerCreationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
