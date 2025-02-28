<?php

namespace App\Filament\Clusters\RulesAndPolicies\Resources\ExchangeAndReturnResource\Pages;

use App\Filament\Clusters\RulesAndPolicies\Resources\ExchangeAndReturnResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExchangeAndReturn extends EditRecord
{
    protected static string $resource = ExchangeAndReturnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
