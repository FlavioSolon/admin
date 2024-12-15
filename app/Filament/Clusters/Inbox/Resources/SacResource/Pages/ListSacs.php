<?php

namespace App\Filament\Clusters\Inbox\Resources\SacResource\Pages;

use App\Filament\Clusters\Inbox\Resources\SacResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSacs extends ListRecords
{
    protected static string $resource = SacResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
