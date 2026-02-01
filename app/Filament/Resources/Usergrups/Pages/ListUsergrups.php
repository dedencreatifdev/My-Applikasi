<?php

namespace App\Filament\Resources\Usergrups\Pages;

use App\Filament\Resources\Usergrups\UsergrupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUsergrups extends ListRecords
{
    protected static string $resource = UsergrupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
