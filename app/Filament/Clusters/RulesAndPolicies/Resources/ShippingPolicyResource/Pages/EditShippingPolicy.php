<?php

namespace App\Filament\Clusters\RulesAndPolicies\Resources\ShippingPolicyResource\Pages;

use App\Filament\Clusters\RulesAndPolicies\Resources\ShippingPolicyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShippingPolicy extends EditRecord
{
    protected static string $resource = ShippingPolicyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
