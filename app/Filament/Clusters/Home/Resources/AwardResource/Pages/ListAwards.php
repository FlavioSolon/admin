<?php

namespace App\Filament\Clusters\Home\Resources\AwardResource\Pages;

use App\Filament\Clusters\Home\Resources\AwardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAwards extends ListRecords
{
    protected static string $resource = AwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}