<?php

namespace App\Filament\Clusters\Home\Pages;

use App\Filament\Clusters\Home;
use Filament\Pages\Page;

class ProductFeatures extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.clusters.home.pages.product-features';

    protected static ?string $cluster = Home::class;

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    protected static ?int $navigationSort = 3;
}
