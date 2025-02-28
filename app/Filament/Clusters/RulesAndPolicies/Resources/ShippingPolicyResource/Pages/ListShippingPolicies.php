<?php

namespace App\Filament\Clusters\RulesAndPolicies\Resources\ShippingPolicyResource\Pages;

use App\Filament\Clusters\RulesAndPolicies\Resources\ShippingPolicyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShippingPolicies extends ListRecords
{
    protected static string $resource = ShippingPolicyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
