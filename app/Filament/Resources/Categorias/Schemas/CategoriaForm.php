<?php

namespace App\Filament\Resources\Categorias\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class CategoriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Información de la Categoría')
                ->description('Completa los datos principales de la categoría del restaurante.')
                ->icon('heroicon-o-tag')
                ->collapsible()
                ->columnSpanFull() // 👈 hace que la sección use todo el ancho
                ->schema([
                    Select::make('restaurante_id')
                        ->label('Restaurante')
                        ->relationship('restaurante', 'nombre')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->placeholder('Selecciona un restaurante')
                        ->columnSpanFull(),

                    TextInput::make('nombre')
                        ->label('Nombre de la categoría')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Ej: Entradas, Bebidas, Postres')
                        ->helperText('Este nombre se mostrará en la carta digital.')
                        ->columnSpanFull(),
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


                    TextInput::make('orden')
                        ->label('Orden de visualización')
                        ->numeric()
                        ->default(0)
                        ->suffixIcon('heroicon-o-bars-3')
                        ->helperText('Define el orden en que aparecerá la categoría en la carta.')
                        ->columnSpanFull(),
                ]),
        ]);
    }
}
