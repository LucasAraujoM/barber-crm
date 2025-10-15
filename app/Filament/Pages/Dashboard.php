<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;

class Dashboard extends Page
{
    //protected string $view = 'filament.pages.dashboard';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Home;

    protected function getHeaderWidgets(): array
    {
        return [
            
        ];
    }
}
