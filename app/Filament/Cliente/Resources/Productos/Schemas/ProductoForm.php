<?php

namespace App\Filament\Cliente\Resources\Productos\Schemas;

use Filament\Forms\Components\{TextInput, Textarea, Toggle, FileUpload, Select};
use Filament\Schemas\Schema;
use Filament\Facades\Filament;
use App\Models\Categoria;

class ProductoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            // ----------------------------------------
            // Información general del producto
            // ----------------------------------------
            Select::make('categoria_id')
                ->label('Categoría')
                ->options(fn() => Categoria::where('restaurante_id', Filament::auth()->user()->restaurante_id)
                    ->pluck('nombre', 'id'))
                ->searchable()
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
                ->helperText('Ingresa el valor del producto en CLP sin puntos ni comas.')
                ->columnSpanFull(),

            FileUpload::make('imagen')
                ->label('Imagen del producto')
                ->image()
                ->disk('public')
                ->visibility('public')
                ->directory('productos')
                ->imageEditor()
                ->previewable(true)
                ->preserveFilenames()
                ->maxSize(2048)
                ->helperText('Sube una imagen representativa del producto (máx. 2 MB).')
                ->columnSpanFull(),

            Toggle::make('activo')
                ->label('Disponible para venta')
                ->onIcon('heroicon-o-check')
                ->offIcon('heroicon-o-x-mark')
                ->default(true)
                ->helperText('Activa o desactiva la visibilidad del producto en la carta.')
                ->columnSpanFull(),
        ]);
    }
}
