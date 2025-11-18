<?php

namespace App\Filament\Resources\Referidos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReferidoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('alias')
                    ->required(),
                TextInput::make('whatsapp'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('banco'),
                TextInput::make('tipo_cuenta'),
                TextInput::make('numero_cuenta'),
                TextInput::make('rut'),
                TextInput::make('link_generado'),
                Select::make('estado')
                    ->options(['activo' => 'Activo', 'inactivo' => 'Inactivo'])
                    ->default('activo')
                    ->required(),
            ]);
    }
}
