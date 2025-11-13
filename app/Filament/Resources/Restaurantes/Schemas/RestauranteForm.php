<?php

namespace App\Filament\Resources\Restaurantes\Schemas;

use Filament\Forms\Components\{ColorPicker, DatePicker, FileUpload, TextInput, Textarea, Toggle};
use Filament\Schemas\Components\{Tabs, Section};
use Filament\Schemas\Schema;
use Illuminate\Support\Str;


class RestauranteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('Restaurante')
                ->tabs([
                    Tabs\Tab::make('Información general')
                        ->icon('heroicon-o-building-storefront')
                        ->schema([
                            TextInput::make('nombre')
                                ->label('Nombre')
                                ->required()
                                ->maxLength(255)
                                ->live(debounce: 500)
                                ->afterStateUpdated(function ($state, callable $set) {
                                    $set('slug', Str::slug($state));
                                })
                                ->placeholder('Ej: Restaurante Los Aromos'),

                            TextInput::make('slug')
                                ->label('Slug')
                                ->disabled()
                                ->dehydrated()
                                ->unique(ignoreRecord: true)
                                ->helperText('Se genera automáticamente a partir del nombre.'),

                            Textarea::make('descripcion')
                                ->label('Descripción')
                                ->placeholder('Breve descripción del negocio...')
                                ->rows(3)
                                ->columnSpanFull(),
                        ]),

                    Tabs\Tab::make('Identidad visual')
                        ->icon('heroicon-o-swatch')
                        ->schema([
                            FileUpload::make('logo')
                                ->label('Logo')
                                ->image()
                                ->imageEditor()
                                ->directory('logos')
                                ->visibility('public')
                                ->disk('public')
                                ->maxSize(2048)
                                ->helperText('Sube el logo del restaurante (JPG, PNG o WEBP).'),

                            ColorPicker::make('color_primario')
                                ->label('Color primario')
                                ->default('#1e40af'),
                        ]),

                    Tabs\Tab::make('Contacto')
                        ->icon('heroicon-o-phone')
                        ->schema([
                            TextInput::make('telefono')
                                ->label('Teléfono')
                                ->tel()
                                ->placeholder('+56 9 1234 5678'),

                            TextInput::make('direccion')
                                ->label('Dirección')
                                ->placeholder('Ej: Av. Principal 456, Catemu'),
                        ]),

                    Tabs\Tab::make('Configuración')
                        ->icon('heroicon-o-cog-6-tooth')
                        ->schema([
                            DatePicker::make('fecha_pago')
                                ->label('Fecha de pago')
                                ->displayFormat('d/m/Y')
                                ->placeholder('Selecciona una fecha'),

                            Toggle::make('activo')
                                ->label('Activo')
                                ->default(true)
                                ->inline(false)
                                ->helperText('Activa o desactiva este registro.'),
                        ]),
                ])
                ->columnSpanFull(),
        ]);
    }
}
