<?php

namespace App\Filament\Resources\Referidos\Pages;

use App\Filament\Resources\Referidos\ReferidoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReferidos extends ListRecords
{
    protected static string $resource = ReferidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
