<?php

namespace App\Filament\Clusters\FindUsPage\Resources\FindUsSlideResource\Pages;

use App\Filament\Clusters\FindUsPage\Resources\FindUsSlideResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFindUsSlide extends EditRecord
{
    protected static string $resource = FindUsSlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
