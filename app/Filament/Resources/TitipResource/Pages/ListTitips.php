<?php

namespace App\Filament\Resources\TitipResource\Pages;

use App\Filament\Resources\TitipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTitips extends ListRecords
{
    protected static string $resource = TitipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
