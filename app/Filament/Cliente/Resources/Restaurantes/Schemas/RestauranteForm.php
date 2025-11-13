<?php

namespace App\Filament\Cliente\Resources\Restaurantes\Schemas;

use Filament\Forms\Components\{TextInput, Textarea, Toggle, DatePicker, FileUpload, ColorPicker};
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Facades\Filament;

class RestauranteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('Restaurante')
                ->columnSpanFull() // Tabs ocupa todo el ancho
                ->tabs([
                    Tabs\Tab::make('Información general')
                        ->schema([
                            TextInput::make('nombre')
                                ->label('Nombre')
                                ->required()
                                ->maxLength(255)
                                ->placeholder('Ej: Restaurante Los Aromos')
                                ->live(debounce: 500)
                                ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state)))
                                ->columnSpanFull(), // campo ocupa ancho completo

                            TextInput::make('slug')
                                ->label('Slug')
                                ->disabled()
                                ->dehydrated()
                                ->unique(ignoreRecord: true)
                                ->helperText('Se genera automáticamente a partir del nombre.')
                                ->columnSpanFull(),

                            Textarea::make('descripcion')
                                ->label('Descripción')
                                ->placeholder('Breve descripción del negocio...')
                                ->rows(3)
                                ->columnSpanFull(),
                        ]),

                    Tabs\Tab::make('Identidad visual')
                        ->schema([
                            FileUpload::make('logo')
                                ->label('Logo')
                                ->image()
                                ->directory('logos')
                                ->visibility('public')
                                ->disk('public')
                                ->maxSize(2048)
                                ->helperText('Sube el logo del restaurante (JPG, PNG o WEBP).')
                                ->columnSpanFull(),

                            ColorPicker::make('color_primario')
                                ->label('Color primario')
                                ->default('#1e40af')
                                ->columnSpanFull(),
                        ]),

                    Tabs\Tab::make('Contacto')
                        ->schema([
                            TextInput::make('telefono')
                                ->label('Teléfono')
                                ->tel()
                                ->placeholder('+56 9 1234 5678')
                                ->columnSpanFull(),
                            TextInput::make('correo')
                                ->label('Correo electrónico')
                                ->email()
                                ->placeholder('Ej: contacto@restaurante.cl')
                                ->columnSpanFull(),

                            TextInput::make('direccion')
                                ->label('Dirección')
                                ->placeholder('Ej: Av. Principal 456, Catemu')
                                ->columnSpanFull(),
                        ]),

                    Tabs\Tab::make('Horario de atención')
                        ->schema([
                            TextInput::make('horario_atencion')
                                ->label('Horario de atención')
                                ->placeholder('Ej: Lunes a Domingo 10:00 - 22:00')
                                ->columnSpanFull(),
                        ]),


                ]),
        ]);
    }
}
