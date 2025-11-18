<?php

namespace App\Filament\Resources\Referidos\Pages;

use App\Filament\Resources\Referidos\ReferidoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditReferido extends EditRecord
{
    protected static string $resource = ReferidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
