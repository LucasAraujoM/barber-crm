<?php

namespace App\Filament\Resources\Customers\Schemas;

use App\Models\Staff;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del cliente')
                    ->components([
                        TextInput::make('name')->required()->label('Nombre'),
                        TextInput::make('email')->email()->required()->label('Email'),
                        TextInput::make('phone')->required()->label('Teléfono'),
                        TextInput::make('address')->label('Dirección'),
                    ]),
                Section::make('Notas')
                    ->components([
                        Select::make('preferred_staff')
                            ->label('Personal preferido')
                            ->options(Staff::all()->pluck('name', 'id')),
                        Textarea::make('notes')
                            ->label('Descripción'),
                    ]),
            ]);
    }
}
