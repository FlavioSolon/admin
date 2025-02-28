<?php

namespace App\Filament\Clusters\RulesAndPolicies\Resources\TermsOfServiceResource\Pages;

use App\Filament\Clusters\RulesAndPolicies\Resources\TermsOfServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTermsOfService extends EditRecord
{
    protected static string $resource = TermsOfServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
