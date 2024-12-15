<?php

namespace App\Filament\Clusters\AboutUs\Resources\AboutThirdSessionResource\Pages;

use App\Filament\Clusters\AboutUs\Resources\AboutThirdSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutThirdSessions extends ListRecords
{
    protected static string $resource = AboutThirdSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
