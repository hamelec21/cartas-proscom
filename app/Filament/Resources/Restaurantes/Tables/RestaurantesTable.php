<?php

namespace App\Filament\Resources\Restaurantes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class RestaurantesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('logo')
                    ->disk('public') // 👈 muy importante si usas storage/app/public
                    ->visibility('public')
                    ->size(60)
                    ->square(),
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('telefono')
                    ->searchable(),
                TextColumn::make('direccion')
                    ->searchable(),
                IconColumn::make('activo')
                    ->boolean(),
                TextColumn::make('fecha_pago')
                    ->date()
                    ->sortable(),

                ImageColumn::make('qr')
                    ->label('QR')
                    ->disk('public')
                    ->size(60) // tamaño del QR en la tabla
                    ->url(fn($record) => $record->qr) // permite abrir o descargar
                    ->openUrlInNewTab(), // abre el QR en nueva pestaña


                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->defaultSort('id', 'desc') // 👈 Orden por ID descendente
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])


            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
