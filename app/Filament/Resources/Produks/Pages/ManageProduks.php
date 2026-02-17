<?php

namespace App\Filament\Resources\Produks\Pages;

use App\Filament\Resources\Produks\ProdukResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageProduks extends ManageRecords
{
    protected static string $resource = ProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
