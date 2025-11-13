<?php

namespace App\Filament\Cliente\Resources\Categorias\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;

class CategoriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1) // campos abajo uno debajo del otro
            ->components([
                Hidden::make('restaurante_id')
                    ->default(fn() => Filament::auth()->user()->restaurante_id),

                TextInput::make('nombre')
                    ->label('Nombre de la categoría')
                    ->placeholder('Ej: Bebidas, Postres, Entradas')
                    ->helperText('Ingresa un nombre claro para tu categoría.')
                    ->required()
                    ->maxLength(255),

               

                    FileUpload::make('icono')
                        ->label('Ícono')
                        ->directory('categorias/iconos')
                        ->disk('public')
                        ->visibility('public')
                        ->image()
                        ->imageEditor()
                        ->imageCropAspectRatio('1:1')
                        ->imageResizeTargetWidth(256)
                        ->imageResizeTargetHeight(256)
                        ->previewable(true)
                        ->downloadable()
                        ->nullable()
                        ->default('categorias/iconos/default.png')
                        ->saveUploadedFileUsing(function ($file, $get) {
                            // Guarda el archivo manualmente en el disco "public"
                            return $file->store('categorias/iconos', 'public');
                        })
                        ->afterStateUpdated(function ($state, callable $set) {
                            // Si hay archivo nuevo, guarda la ruta
                            if ($state) {
                                $set('icono', $state);
                            }
                        })
                        ->dehydrated(true)
                        ->getUploadedFileNameForStorageUsing(function ($file) {
                            return 'icono-' . time() . '.' . $file->getClientOriginalExtension();
                        }),




            ]);
    }
}
