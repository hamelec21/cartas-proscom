<?php

namespace App\Filament\Widgets;

use App\Models\Referido; // <-- Cambia por tu modelo!
use Filament\Widgets\ChartWidget;

class GaficoRegistroReferidos extends ChartWidget
{
    protected ?string $heading = 'Gráfico Registro de Referidos por Mes';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        // Obtener registros agrupados por mes
        $registros = Referido::selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
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

        // Alinear datos de enero → diciembre
        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = $mesesNombres[$i];
            $data[] = $registros[$i] ?? 0; // 0 si no hubo registros ese mes
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Registros Referidos',
                    'data' => $data,
                    'backgroundColor' => '#10B981', // Verde
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
