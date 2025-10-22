<?php

namespace App\Filament\Resources\Staff\Schemas;

use App\Models\Skill;
use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;
use Illuminate\Support\Facades\Auth;

class StaffForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('document_number')->unique()->required(),
                        TextInput::make('phone')->unique(),
                        TextInput::make('email')->email()->unique(),
                        TextInput::make('address'),
                        FileUpload::make('avatar')
                            ->avatar()
                            ->disk('public') // s3(amazon), public or private
                            ->directory('staff/photos')
                            ->maxSize(1024 * 50) // 50 MB
                            ->label('Profile Picture'),
                    ]),
                Section::make('Skills')
                    ->schema([
                        Select::make('skills')
                            ->multiple()
                            ->relationship(name: 'skills', titleAttribute: 'label')
                            ->preload()
                            ->label('Select Skills'),
                        Select::make('working_hours')
                            ->multiple()
                            ->options([
                                'morning' => 'Morning (09:00 - 12:00)',
                                'afternoon' => 'Afternoon (13:00 - 17:00)',
                                'evening' => 'Evening (18:00 - 20:00)',
                            ]),
                        TextInput::make('base_salary')
                            ->numeric()
                            ->label('Base Salary')
                            ->prefix('$')
                            ->hidden(fn (Auth $auth) => !$auth::user()->is_admin),
                        Radio::make('work_by')
                            ->options([
                                'fixed' => 'Fixed Salary',
                                'commission' => 'Commission',
                                'mixed' => 'Mixed',
                                'rent' => 'Rent Space',
                            ])
                            ->reactive(),
                        TextInput::make('fixed_rate')
                            ->numeric()
                            ->label('Fixed Salary')
                            ->prefix('$')
                            ->reactive()
                            ->hidden(fn (Get $get) => $get('work_by') !== 'fixed'),
                        Slider::make('commission_rate')
                            ->label('Commission Rate')
                            ->range(minValue: 0, maxValue: 100)
                            ->decimalPlaces(0)
                            ->tooltips()
                            ->reactive()
                            ->hidden(fn (Get $get) => $get('work_by') !== 'commission'),
                        TextInput::make('mixted_base')
                            ->numeric()
                            ->label('Mixed Base Salary')
                            ->prefix('$')
                            ->reactive()
                            ->hidden(fn (Get $get) => $get('work_by') !== 'mixed'),
                        Slider::make('mixed_rate')
                            ->label('Rate')
                            ->range(minValue: 0, maxValue: 100)
                            ->decimalPlaces(0)
                            ->tooltips()
                            ->reactive()
                            ->fillTrack()
                            ->tooltips(RawJs::make(<<<'JS'
                                `%${$value.toFixed(0)}`
                                JS))
                            ->hidden(fn (Get $get) => $get('work_by') !== 'mixed'),
                        TextInput::make('rent_rate')
                            ->numeric()
                            ->label('Rent Space')
                            ->prefix('$')
                            ->reactive()
                            ->hidden(fn (Get $get) => $get('work_by') !== 'rent'),
                    ]),
            ]);
    }
}
