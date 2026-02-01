<?php

namespace App\Filament\Resources\Usergrups\Pages;

use App\Filament\Resources\Usergrups\UsergrupResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditUsergrup extends EditRecord
{
    protected static string $resource = UsergrupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
