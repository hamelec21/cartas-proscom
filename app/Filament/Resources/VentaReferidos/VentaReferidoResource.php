<?php

namespace App\Filament\Resources\VentaReferidos;

use App\Filament\Resources\VentaReferidos\Pages\CreateVentaReferido;
use App\Filament\Resources\VentaReferidos\Pages\EditVentaReferido;
use App\Filament\Resources\VentaReferidos\Pages\ListVentaReferidos;
use App\Filament\Resources\VentaReferidos\Schemas\VentaReferidoForm;
use App\Filament\Resources\VentaReferidos\Tables\VentaReferidosTable;
use App\Models\Venta_Referido;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class VentaReferidoResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Vendedores';

    protected static ?string $model = Venta_Referido::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'referido_id';

    public static function form(Schema $schema): Schema
    {
        return VentaReferidoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VentaReferidosTable::configure($table);
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
            'index' => ListVentaReferidos::route('/'),
            'create' => CreateVentaReferido::route('/create'),
            'edit' => EditVentaReferido::route('/{record}/edit'),
        ];
    }
}
