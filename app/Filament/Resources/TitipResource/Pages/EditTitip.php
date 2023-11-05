<?php

namespace App\Filament\Resources\TitipResource\Pages;

use App\Filament\Resources\TitipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTitip extends EditRecord
{
    protected static string $resource = TitipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
