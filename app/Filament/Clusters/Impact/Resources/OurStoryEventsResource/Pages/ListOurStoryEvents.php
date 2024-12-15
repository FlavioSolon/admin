<?php

namespace App\Filament\Clusters\Impact\Resources\OurStoryEventsResource\Pages;

use App\Filament\Clusters\Impact\Resources\OurStoryEventsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOurStoryEvents extends ListRecords
{
    protected static string $resource = OurStoryEventsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
