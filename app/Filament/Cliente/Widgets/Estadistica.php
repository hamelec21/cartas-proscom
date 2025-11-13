<?php

namespace App\Filament\Cliente\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

class Estadistica extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();
        $restaurante = $user->restaurante;

        $restaurantesCount = $restaurante ? 1 : 0; // cada usuario tiene 0 o 1 restaurante
        $categoriasCount = $restaurante
            ? $restaurante->categorias()->count()
            : 0;

        $productosCount = $restaurante
            ? Producto::whereIn('categoria_id', $restaurante->categorias()->pluck('id'))->count()
            : 0;

        return [
            Stat::make('Restaurantes', $restaurantesCount)
                ->description('Cantidad total de restaurantes')
                ->icon('heroicon-m-building-storefront')
                ->color('primary'),

            Stat::make('Categorías', $categoriasCount)
                ->description('Cantidad total de categorías')
                ->icon('heroicon-m-archive-box')
                ->color('warning'),

            Stat::make('Productos', $productosCount)
                ->description('Cantidad total de productos')
                ->icon('heroicon-m-cube')
                ->color('danger'),
        ];
    }
}
