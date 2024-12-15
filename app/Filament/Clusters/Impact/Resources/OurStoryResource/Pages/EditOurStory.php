<?php

namespace App\Filament\Clusters\Impact\Resources\OurStoryResource\Pages;

use App\Filament\Clusters\Impact\Resources\OurStoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurStory extends EditRecord
{
    protected static string $resource = OurStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
