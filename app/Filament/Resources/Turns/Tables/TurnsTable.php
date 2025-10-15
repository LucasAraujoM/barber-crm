<?php

namespace App\Filament\Resources\Turns\Tables;

use App\Models\Customer;
use App\Models\Staff;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class TurnsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_id')
                    ->label('Customer')
                    ->formatStateUsing(fn (string $state) => Customer::find($state)->name),
                TextColumn::make('staff_id')
                    ->label('Staff')
                    ->formatStateUsing(fn (string $state) => Staff::find($state)->name),
                TextColumn::make('time')
                    ->label('Time'),
                TextColumn::make('date')
                    ->label('Date'),
            ])
            ->filters([
                TrashedFilter::make(),
                SelectFilter::make('customer_id')
                    ->label('Customer')
                    ->relationship('customer', 'name')
                    ->searchable()
                    ->preload()
                    ->getSearchResultsUsing(fn (string $search): array => 
                        Customer::where('name', 'like', "%{$search}%")
                            ->orWhere('phone', 'like', "%{$search}%")
                            ->limit(50)
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->getOptionLabelUsing(fn ($value): ?string => 
                        Customer::find($value)?->name
                    ),
                SelectFilter::make('staff_id')
                    ->label('Staff')
                    ->options(Staff::all()->pluck('name', 'id'))
                    ->searchable(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
