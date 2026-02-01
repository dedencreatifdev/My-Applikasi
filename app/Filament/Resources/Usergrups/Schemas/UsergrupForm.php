<?php

namespace App\Filament\Resources\Usergrups\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UsergrupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_grup')
                    ->required(),
            ]);
    }
}
