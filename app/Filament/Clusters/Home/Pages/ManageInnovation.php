<?php

namespace App\Filament\Clusters\Home\Pages;

use App\Filament\Clusters\Home;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Livewire\Livewire;

class ManageInnovation extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static string $view = 'filament.clusters.home.pages.manage-innovation';

    protected static ?string $cluster = Home::class;

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    protected static ?int $navigationSort = 4;
}
