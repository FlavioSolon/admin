<?php

namespace App\Filament\Clusters\RulesAndPolicies\Resources\PrivacyPolicyResource\Pages;

use App\Filament\Clusters\RulesAndPolicies\Resources\PrivacyPolicyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePrivacyPolicy extends CreateRecord
{
    protected static string $resource = PrivacyPolicyResource::class;
}
