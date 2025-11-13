<?php

namespace App\Filament\Resources\Productos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class ProductoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Información del Producto')
                ->description('Completa los detalles principales del producto dentro de la carta.')
                ->icon('heroicon-o-cube')
                ->collapsible()
                ->columnSpanFull() // ocupa todo el ancho disponible
                ->schema([
                    Select::make('categoria_id')
                        ->label('Categoría')
                        ->relationship('categoria', 'nombre')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->placeholder('Selecciona una categoría')
                        ->columnSpanFull(),

                    TextInput::make('nombre')
                        ->label('Nombre del producto')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Ej: Pizza Napolitana, Limonada Natural')
                        ->helperText('Este nombre será visible en la carta digital.')
                        ->columnSpanFull(),

                    Textarea::make('descripcion')
                        ->label('Descripción')
                        ->rows(3)
                        ->placeholder('Describe brevemente el producto, sus ingredientes o características.')
                        ->autosize()
                        ->helperText('Texto opcional, se mostrará bajo el nombre del producto.')
                        ->columnSpanFull(),

                    TextInput::make('precio')
                        ->label('Precio')
                        ->numeric()
                        ->required()
                        ->default(0)
                        ->prefix('$')
                        ->helperText('Ingresa el valor del producto sin puntos ni comas.')
                        ->columnSpanFull(),

                    FileUpload::make('imagen')
                        ->label('Imagen del producto')
                        ->image() // indica que se trata de imágenes
                        ->directory('productos') // carpeta dentro de storage/app/public/productos
                        ->visibility('public')
                        ->disk('public')
                        ->imageEditor() // permite recortar o ajustar la imagen
                        ->previewable(true)
                        ->preserveFilenames() // mantiene el nombre original del archivo
                        ->maxSize(2048) // tamaño máximo (en KB) = 2MB
                        ->helperText('Sube una imagen representativa del producto (máx. 2 MB).')
                        ->columnSpanFull(),


                    Toggle::make('activo')
                        ->label('Disponible para venta')
                        ->onIcon('heroicon-o-check')
                        ->offIcon('heroicon-o-x-mark')
                        ->default(true)
                        ->helperText('Activa o desactiva la visibilidad del producto en la carta.')
                        ->columnSpanFull(),
                ]),
        ]);
    }
}
