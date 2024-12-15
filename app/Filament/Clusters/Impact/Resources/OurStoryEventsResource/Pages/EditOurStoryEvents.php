<?php

namespace App\Filament\Clusters\Impact\Resources\OurStoryEventsResource\Pages;

use App\Filament\Clusters\Impact\Resources\OurStoryEventsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurStoryEvents extends EditRecord
{
    protected static string $resource = OurStoryEventsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
