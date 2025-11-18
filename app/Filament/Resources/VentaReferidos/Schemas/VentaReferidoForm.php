<?php

namespace App\Filament\Resources\VentaReferidos\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class VentaReferidoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Aquí agregas el campo
                Select::make('estado_pago')
                    ->label('Estado de Pago')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'pagado' => 'Pagado',
                    ])
                    ->required()
                    ->default('pendiente')
                    ->native(false),
            ]);
    }
}
