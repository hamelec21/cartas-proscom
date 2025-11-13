<?php

namespace App\Filament\Cliente\Resources\Restaurantes\Tables;

use Filament\Actions\BulkActionGroup;
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
                    ->label('Logo')
                    ->disk('public') // 👈 muy importante si usas storage/app/public
                    ->size(60)
                    ->visibility('public'),


                TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('direccion')
                    ->label('Dirección')
                    ->searchable()
                    ->sortable(),

                IconColumn::make('activo')
                    ->label('Activo')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('fecha_pago')
                    ->label('Fecha de pago')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('color_primario')
                    ->label('Color')
                    ->formatStateUsing(fn($state) => "<div style='width:20px;height:20px;background-color:$state;border-radius:50%;'></div>")
                    ->html(),

                ImageColumn::make('qr')
                    ->label('QR')
                    ->disk('public')
                    ->size(60) // tamaño del QR en la tabla
                    ->url(fn($record) => $record->qr) // permite abrir o descargar
                    ->openUrlInNewTab(), // abre el QR en nueva pestaña



                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
