<?php

namespace App\Filament\Resources\Customers\Tables;

use App\Models\Customer;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('phone')->label('Teléfono')->searchable()->copyable()->copyMessage('Numero de telefono copiado'),
                TextColumn::make('turno')->label('Turno')->sortable()->searchable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Editar'),
                Action::make('Notificar')
                    ->label('Notificar turno por WhatsApp')
                    ->icon('heroicon-o-bell')
                    ->color('success')
                    //disabled if $record->notified == true
                    ->disabled(true)
                    ->action(function (Customer $record) {
                        // Notificar al cliente por whatsapp
                       /*  $record->notify(new \App\Notifications\CustomerNotification($record)); */
                        // Mostrar un mensaje de éxito
                        Notification::make()
                            ->title('Notificación enviada con éxito')
                            ->success()
                            ->send();
                    }),
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
