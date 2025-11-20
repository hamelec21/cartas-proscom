<?php

namespace App\Filament\Widgets;

use App\Models\Venta_Referido;
use Filament\Widgets\ChartWidget;

class GaficoVenta extends ChartWidget
{
    protected ?string $heading = 'Ventas Referidos por Mes';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Obtener ventas referidas agrupadas por mes
        $ventas = Venta_Referido::whereNotNull('referido_id')  // <-- ajusta si tu campo se llama diferente
            ->selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes')
            ->toArray();

        // Etiquetas de meses
        $mesesNombres = [
            1 => "Enero",
            2 => "Febrero",
            3 => "Marzo",
            4 => "Abril",
            5 => "Mayo",
            6 => "Junio",
            7 => "Julio",
            8 => "Agosto",
            9 => "Septiembre",
            10 => "Octubre",
            11 => "Noviembre",
            12 => "Diciembre"
        ];

        // Armando datos alineados a meses 1 → 12
        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = $mesesNombres[$i];
            $data[] = $ventas[$i] ?? 0; // 0 si no hubo ventas ese mes
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Ventas Referidas',
                    'data' => $data,
                    'backgroundColor' => '#4F46E5',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
