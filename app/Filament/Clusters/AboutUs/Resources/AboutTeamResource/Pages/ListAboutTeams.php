<?php

namespace App\Filament\Clusters\AboutUs\Resources\AboutTeamResource\Pages;

use App\Filament\Clusters\AboutUs\Resources\AboutTeamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutTeams extends ListRecords
{
    protected static string $resource = AboutTeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
