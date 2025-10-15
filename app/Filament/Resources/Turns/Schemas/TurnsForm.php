<?php

namespace App\Filament\Resources\Turns\Schemas;

use App\Models\Customer;
use App\Models\Staff;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class TurnsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('staff_id')
                    ->label('Barber')
                    ->options(Staff::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('customer_id')
                    ->label('Client')
                    ->options(Customer::all()->pluck('name', 'id'))
                    ->searchable(),
                DatePicker::make('date')
                    ->native(false)
                    ->placeholder(now()->format('d-m-y'))
                    ->defaultFocusedDate(now()->tomorrow())
                    ->minDate(now())
                    ->maxDate(now()->days(30))
                    ->seconds(false),
                TimePicker::make('time')
                    ->placeholder(now()->format('H:m'))
                    ->defaultFocusedDate(now()->tomorrow())
                    ->minDate("09:00")
                    ->maxDate("20:00")
                    ->seconds(false)
            ]);
    }
}
