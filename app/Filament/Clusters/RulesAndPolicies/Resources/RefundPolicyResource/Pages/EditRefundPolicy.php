<?php

namespace App\Filament\Clusters\RulesAndPolicies\Resources\RefundPolicyResource\Pages;

use App\Filament\Clusters\RulesAndPolicies\Resources\RefundPolicyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefundPolicy extends EditRecord
{
    protected static string $resource = RefundPolicyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
