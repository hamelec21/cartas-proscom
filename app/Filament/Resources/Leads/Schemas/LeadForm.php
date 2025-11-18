<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('telefono')
                    ->tel(),
                TextInput::make('negocio'),
                TextInput::make('ref_code'),
                Select::make('estado')
                    ->options(['nuevo' => 'Nuevo', 'contactado' => 'Contactado', 'convertido' => 'Convertido'])
                    ->default('nuevo')
                    ->required(),
            ]);
    }
}
