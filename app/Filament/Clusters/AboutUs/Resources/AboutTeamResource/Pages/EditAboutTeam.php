<?php

namespace App\Filament\Clusters\AboutUs\Resources\AboutTeamResource\Pages;

use App\Filament\Clusters\AboutUs\Resources\AboutTeamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutTeam extends EditRecord
{
    protected static string $resource = AboutTeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
