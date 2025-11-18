<?php

namespace App\Filament\Resources\VentaReferidos\Pages;

use App\Filament\Resources\VentaReferidos\VentaReferidoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVentaReferidos extends ListRecords
{
    protected static string $resource = VentaReferidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // CreateAction::make(),
        ];
    }
}
