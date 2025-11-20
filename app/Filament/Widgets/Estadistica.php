<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Restaurante;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Referido;
use App\Models\Venta_Referido;

class Estadistica extends StatsOverviewWidget
{
     protected static ?int $sort = 0;
    protected function getStats(): array
    {
        return [
            Stat::make('Restaurantes', Restaurante::count())
                ->description('Cantidad total de restaurantes')
                ->icon('heroicon-m-building-storefront') // Icono de tienda/restaurante
                ->color('primary'),

            Stat::make('Usuarios', User::count())
                ->description('Cantidad total de usuarios')
                ->icon('heroicon-m-user-group') // Icono de usuario
                ->color('success'),

            Stat::make('Categorías', Categoria::count())
                ->description('Cantidad total de categorías')
                ->icon('heroicon-m-archive-box') // Icono de categoría
                ->color('warning'),

            Stat::make('Productos', Producto::count())
                ->description('Cantidad total de productos')
                ->icon('heroicon-m-cube') // Icono de producto
                ->color('danger'),

            Stat::make('Referidos', Referido::count())
                ->description('Referidos registrados')
                ->icon('heroicon-m-user') // Icono
                ->color('success'),

                 Stat::make('Venta Referido', Venta_Referido::count())
                ->description('Ventas Referidos')
                ->icon('heroicon-m-user') // Icono
                ->color('success'),
        ];
    }
}
