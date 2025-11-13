<?php

namespace App\Filament\Cliente\Resources\Categorias\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icono')
                    ->label('Ícono')
                    ->disk('public') // 👈 muy importante si usas storage/app/public
                    ->visibility('public')
                    ->size(40)
                    ->square()
                    ->defaultImageUrl(asset('storage/categorias/iconos/default.png')), // 👈 por si no hay icono

                TextColumn::make('nombre')

                    ->searchable()
                    ->label('Categoría'),
            ])
            ->defaultSort('id', 'asc') // 👈 Orden por ID descendente
            ->filters([
                //
            ])
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
