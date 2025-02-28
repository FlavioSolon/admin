<?php

namespace App\Filament\Clusters\RulesAndPolicies\Resources\ExchangeAndReturnResource\Pages;

use App\Filament\Clusters\RulesAndPolicies\Resources\ExchangeAndReturnResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExchangeAndReturns extends ListRecords
{
    protected static string $resource = ExchangeAndReturnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
