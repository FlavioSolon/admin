<?php

namespace App\Filament\Clusters\RulesAndPolicies\Resources\RefundPolicyResource\Pages;

use App\Filament\Clusters\RulesAndPolicies\Resources\RefundPolicyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRefundPolicy extends CreateRecord
{
    protected static string $resource = RefundPolicyResource::class;
}
