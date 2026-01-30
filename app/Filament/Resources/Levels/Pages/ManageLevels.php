<?php

namespace App\Filament\Resources\Levels\Pages;

use App\Filament\Resources\Levels\LevelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Icons\Heroicon;

class ManageLevels extends ManageRecords
{
    protected static string $resource = LevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->disableCreateAnother()
                ->label('Tambah')
                ->color('primary')
                ->icon(Heroicon::Plus)
                ->requiresConfirmation()
                ->modalDescription('Berikut adalah detail dari level yang dipilih.'),
        ];
    }

}
