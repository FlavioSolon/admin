<?php

namespace App\Filament\Clusters\RulesAndPolicies\Resources\TermsOfServiceResource\Pages;

use App\Filament\Clusters\RulesAndPolicies\Resources\TermsOfServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTermsOfServices extends ListRecords
{
    protected static string $resource = TermsOfServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
