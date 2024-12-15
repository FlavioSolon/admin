<?php

namespace App\Filament\Clusters\Product\Resources\ExpertOpinionResource\Pages;

use App\Filament\Clusters\Product\Resources\ExpertOpinionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExpertOpinion extends EditRecord
{
    protected static string $resource = ExpertOpinionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
