<?php

namespace App\Filament\Clusters\Impact\Resources\PartnerFarmersResource\Pages;

use App\Filament\Clusters\Impact\Resources\PartnerFarmersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnerFarmers extends EditRecord
{
    protected static string $resource = PartnerFarmersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
