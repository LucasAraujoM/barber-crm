<?php

namespace App\Filament\Resources\Turns;

use App\Filament\Resources\Turns\Pages\CreateTurns;
use App\Filament\Resources\Turns\Pages\EditTurns;
use App\Filament\Resources\Turns\Pages\ListTurns;
use App\Filament\Resources\Turns\Pages\ViewTurns;
use App\Filament\Resources\Turns\Schemas\TurnsForm;
use App\Filament\Resources\Turns\Schemas\TurnsInfolist;
use App\Filament\Resources\Turns\Tables\TurnsTable;
use App\Models\Turns;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TurnsResource extends Resource
{
    protected static ?string $model = Turns::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::QueueList;

    public static function form(Schema $schema): Schema
    {
        return TurnsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TurnsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TurnsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTurns::route('/'),
            'create' => CreateTurns::route('/create'),
            'view' => ViewTurns::route('/{record}'),
            'edit' => EditTurns::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
