<?php

namespace App\Filament\Clusters\AboutUs\Resources\AboutSecondSessionResource\Pages;

use App\Filament\Clusters\AboutUs\Resources\AboutSecondSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutSecondSession extends EditRecord
{
    protected static string $resource = AboutSecondSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
