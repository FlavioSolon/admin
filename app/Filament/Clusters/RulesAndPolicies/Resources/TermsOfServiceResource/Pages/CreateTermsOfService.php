<?php

namespace App\Filament\Clusters\RulesAndPolicies\Resources\TermsOfServiceResource\Pages;

use App\Filament\Clusters\RulesAndPolicies\Resources\TermsOfServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTermsOfService extends CreateRecord
{
    protected static string $resource = TermsOfServiceResource::class;
}
