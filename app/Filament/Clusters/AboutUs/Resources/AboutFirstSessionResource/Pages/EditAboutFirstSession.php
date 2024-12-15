<?php

namespace App\Filament\Clusters\AboutUs\Resources\AboutFirstSessionResource\Pages;

use App\Filament\Clusters\AboutUs\Resources\AboutFirstSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutFirstSession extends EditRecord
{
    protected static string $resource = AboutFirstSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
