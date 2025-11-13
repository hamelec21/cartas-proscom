<?php

namespace App\Filament\Cliente\Resources\Restaurantes\Pages;

use App\Filament\Cliente\Resources\Restaurantes\RestauranteResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRestaurante extends EditRecord
{
    protected static string $resource = RestauranteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
