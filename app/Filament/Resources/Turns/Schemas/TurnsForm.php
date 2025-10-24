<?php

namespace App\Filament\Resources\Turns\Schemas;

use App\Models\Customer;
use App\Models\Staff;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class TurnsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Turno')
                    ->columns(1)
                    ->components([
                        Wizard::make([
                            Step::make('date')
                                ->label('Fecha')
                                ->icon(Heroicon::CalendarDays)
                                ->schema([
                                    DatePicker::make('date')
                                        ->label('Seleccione el dia del turno')
                                        ->native(false)
                                        ->placeholder(now()->format('d-m-y'))
                                        ->defaultFocusedDate(now()->tomorrow())
                                        ->minDate(now())
                                        ->seconds(false)
                                        ->displayFormat('d-M-Y')
                                        ->locale('es'),
                                ]),
                            Step::make('time')
                                ->label('Hora')
                                ->icon(Heroicon::Clock)
                                ->schema([
                                    TimePicker::make('time')
                                        ->label('Seleccione la hora del turno')
                                        ->placeholder(now()->format('H:i'))
                                        ->defaultFocusedDate(now()->tomorrow())
                                        ->minDate(now()->addHour()->format('H:i'))
                                        ->maxDate(now()->addHour()->addMinutes(30)->format('H:i'))
                                        ->seconds(false)
                                        ->minutesStep(30),
                                ]),
                            Step::make('customer')
                                ->label('Cliente')
                                ->icon(Heroicon::User)
                                ->schema([
                                    TextInput::make('name')
                                        ->label('Nombre del cliente')
                                        ->required(),
                                    TextInput::make('phone')
                                        ->label('Número de teléfono')
                                        ->required(),
                                ]),
                        ])
                    ]),
                /* Select::make('staff_id')
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
                    ->seconds(false),
                TimePicker::make('time')
                    ->placeholder(now()->format('H:i'))
                    ->defaultFocusedDate(now()->tomorrow())
                    ->minDate(now()->addHour()->format('H:i'))
                    ->maxDate(now()->addHour()->addMinutes(30)->format('H:i'))
                    ->seconds(false)
                    ->minutesStep(30),
                    //add disable dates from future feature in user configuration
                    /* ->disabledDates(fn ($date) => $date->isWeekend()), */
            ]);
    }
}
