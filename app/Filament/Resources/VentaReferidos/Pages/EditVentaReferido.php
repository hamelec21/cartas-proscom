<?php

namespace App\Filament\Resources\VentaReferidos\Pages;

use App\Filament\Resources\VentaReferidos\VentaReferidoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVentaReferido extends EditRecord
{
    protected static string $resource = VentaReferidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
