<?php

namespace App\Filament\Clusters\Home\Resources\AwardResource\Pages;

use App\Filament\Clusters\Home\Resources\AwardResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAward extends CreateRecord
{
    protected static string $resource = AwardResource::class;
}
