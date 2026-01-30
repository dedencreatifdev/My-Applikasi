<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Icons\Heroicon;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;


    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->disableCreateAnother()
                ->label('Tambah')
                ->color('primary')
                ->icon(Heroicon::Plus)
                ->requiresConfirmation()
                ->modalDescription('Berikut adalah detail dari user yang dipilih.')
                ->modalIcon(Heroicon::User),
        ];
    }
}
