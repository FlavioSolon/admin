<?php

namespace App\Filament\Clusters\Product\Resources\ExpertOpinionResource\Pages;

use App\Filament\Clusters\Product\Resources\ExpertOpinionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExpertOpinions extends ListRecords
{
    protected static string $resource = ExpertOpinionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
