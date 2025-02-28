<?php

namespace App\Filament\Clusters\RulesAndPolicies\Resources\ShippingPolicyResource\Pages;

use App\Filament\Clusters\RulesAndPolicies\Resources\ShippingPolicyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShippingPolicy extends CreateRecord
{
    protected static string $resource = ShippingPolicyResource::class;
}
