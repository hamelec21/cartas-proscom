<?php

namespace App\Filament\Resources\Restaurantes;

use App\Filament\Resources\Restaurantes\Pages\CreateRestaurante;
use App\Filament\Resources\Restaurantes\Pages\EditRestaurante;
use App\Filament\Resources\Restaurantes\Pages\ListRestaurantes;
use App\Filament\Resources\Restaurantes\Schemas\RestauranteForm;
use App\Filament\Resources\Restaurantes\Tables\RestaurantesTable;
use App\Models\Restaurante;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RestauranteResource extends Resource
{
    protected static ?string $model = Restaurante::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre';
     protected static ?string $navigationLabel = 'Crear Restaurantes';

    public static function form(Schema $schema): Schema
    {
        return RestauranteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RestaurantesTable::configure($table);
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
            'index' => ListRestaurantes::route('/'),
            'create' => CreateRestaurante::route('/create'),
            'edit' => EditRestaurante::route('/{record}/edit'),
        ];
    }
}
