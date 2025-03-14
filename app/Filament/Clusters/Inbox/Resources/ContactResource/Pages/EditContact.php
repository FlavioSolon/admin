<?php

namespace App\Filament\Clusters\Inbox\Resources\ContactResource\Pages;

use App\Filament\Clusters\Inbox\Resources\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContact extends EditRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
