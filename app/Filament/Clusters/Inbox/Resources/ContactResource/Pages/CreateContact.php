<?php

namespace App\Filament\Clusters\Inbox\Resources\ContactResource\Pages;

use App\Filament\Clusters\Inbox\Resources\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContact extends CreateRecord
{
    protected static string $resource = ContactResource::class;
}
