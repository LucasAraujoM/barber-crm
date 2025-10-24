<?php

namespace App\Filament\Resources\Staff\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class StaffTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')->sortable()->searchable(),
                TextColumn::make('document_number')->label('Documento')->searchable(),
                ImageColumn::make('avatar')
                    ->disk('public')
                    ->label(false)
                    ->circular(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('phone')->label('Teléfono')->sortable()->searchable()->copyable()->copyMessage('Numero de telefono copiado'),
            ])
            ->filters([
                TrashedFilter::make()
                    ->label('filtros'),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Editar'),
                ViewAction::make()
                    ->label('Ver')
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Eliminar'),
                    ForceDeleteBulkAction::make()
                        ->label('Eliminar permanentemente'),
                    RestoreBulkAction::make()
                        ->label('Restaurar'),
                ])->label('Acciones'),
            ]);
    }
}
