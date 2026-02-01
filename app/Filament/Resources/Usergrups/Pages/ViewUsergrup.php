<?php

namespace App\Filament\Resources\Usergrups\Pages;

use App\Filament\Resources\Usergrups\UsergrupResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewUsergrup extends ViewRecord
{
    protected static string $resource = UsergrupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // EditAction::make(),
        ];
    }
}
