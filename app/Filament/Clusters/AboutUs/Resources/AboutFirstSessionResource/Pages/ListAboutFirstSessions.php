<?php

namespace App\Filament\Clusters\AboutUs\Resources\AboutFirstSessionResource\Pages;

use App\Filament\Clusters\AboutUs\Resources\AboutFirstSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutFirstSessions extends ListRecords
{
    protected static string $resource = AboutFirstSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
