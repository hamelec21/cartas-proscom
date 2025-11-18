<?php

namespace App\Filament\Resources\VentaReferidos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class VentaReferidosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('cliente')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('monto')
                    ->label('Monto')
                    ->money('CLP')
                    ->sortable(),

                TextColumn::make('comision')
                    ->label('Comisión')
                    ->money('CLP')
                    ->sortable(),

                TextColumn::make('referido.alias')
                    ->label('Referido')
                    ->badge()
                    ->color('primary')
                    ->sortable(),

                TextColumn::make('estado_pago')
                    ->label('Estado de Pago')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'pagado' => 'success',     // verde
                        'pendiente' => 'warning',  // amarillo
                        default => 'gray',         // por si acaso
                    })
                    ->sortable(),


                TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                // DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}
