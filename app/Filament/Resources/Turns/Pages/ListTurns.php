<?php

namespace App\Filament\Resources\Turns\Pages;

use App\Filament\Resources\Turns\TurnsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTurns extends ListRecords
{
    protected static string $resource = TurnsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
