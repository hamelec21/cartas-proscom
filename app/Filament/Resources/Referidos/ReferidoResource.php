<?php

namespace App\Filament\Resources\Referidos;

use App\Filament\Resources\Referidos\Pages\CreateReferido;
use App\Filament\Resources\Referidos\Pages\EditReferido;
use App\Filament\Resources\Referidos\Pages\ListReferidos;
use App\Filament\Resources\Referidos\Schemas\ReferidoForm;
use App\Filament\Resources\Referidos\Tables\ReferidosTable;
use App\Models\Referido;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ReferidoResource extends Resource
{
     protected static string | UnitEnum | null $navigationGroup = 'Vendedores';
    protected static ?string $model = Referido::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'email';

    public static function form(Schema $schema): Schema
    {
        return ReferidoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReferidosTable::configure($table);
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
            'index' => ListReferidos::route('/'),
            'create' => CreateReferido::route('/create'),
            'edit' => EditReferido::route('/{record}/edit'),
        ];
    }
}
