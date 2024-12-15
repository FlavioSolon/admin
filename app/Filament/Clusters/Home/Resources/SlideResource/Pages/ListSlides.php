<?php

namespace App\Filament\Clusters\Home\Resources\SlideResource\Pages;

use App\Filament\Clusters\Home\Resources\SlideResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSlides extends ListRecords
{
    protected static string $resource = SlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
