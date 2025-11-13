<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Información del Usuario')
                ->description('Completa los datos principales del usuario asociado al sistema.')
                ->icon('heroicon-o-user-circle')
                ->collapsible()
                ->columnSpanFull()
                ->schema([
                    TextInput::make('name')
                        ->label('Nombre completo')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Ej: Juan Pérez')
                        ->helperText('Nombre y apellido del usuario.')
                        ->columnSpanFull(),

                    TextInput::make('email')
                        ->label('Correo electrónico')
                        ->email()
                        ->required()
                        ->placeholder('usuario@ejemplo.com')
                        ->helperText('Este correo se usará para iniciar sesión.')
                        ->columnSpanFull(),

                    DateTimePicker::make('email_verified_at')
                        ->label('Verificado el')
                        ->native(false)
                        ->seconds(false)
                        ->helperText('Fecha en que el correo fue verificado.')
                        ->columnSpanFull(),

                    TextInput::make('password')
                        ->label('Contraseña')
                        ->password()
                        ->revealable() // permite mostrar/ocultar la contraseña
                        ->required(fn($context) => $context === 'create')
                        ->placeholder('••••••••')
                        ->helperText('Se recomienda una contraseña segura.')
                        ->columnSpanFull(),

                    Select::make('restaurante_id')
                        ->label('Restaurante asignado')
                        ->relationship('restaurante', 'nombre')
                        ->searchable()
                        ->preload()
                        ->placeholder('Selecciona un restaurante')
                        ->helperText('El restaurante al que pertenece este usuario.')
                        ->columnSpanFull(),
                ]),
        ]);
    }
}
