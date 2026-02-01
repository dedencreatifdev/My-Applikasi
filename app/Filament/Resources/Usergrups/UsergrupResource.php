<?php

namespace App\Filament\Resources\Usergrups;

use App\Filament\Resources\Usergrups\Pages\CreateUsergrup;
use App\Filament\Resources\Usergrups\Pages\EditUsergrup;
use App\Filament\Resources\Usergrups\Pages\ListUsergrups;
use App\Filament\Resources\Usergrups\Pages\ViewUsergrup;
use App\Filament\Resources\Usergrups\Schemas\UsergrupForm;
use App\Filament\Resources\Usergrups\Schemas\UsergrupInfolist;
use App\Filament\Resources\Usergrups\Tables\UsergrupsTable;
use App\Models\Usergrup;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class UsergrupResource extends Resource
{
    protected static ?string $model = Usergrup::class;
    protected static string|UnitEnum|null $navigationGroup = 'User Management';

    protected static ?string $recordTitleAttribute = 'nama_grup';

    public static function form(Schema $schema): Schema
    {
        return UsergrupForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UsergrupInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsergrupsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UsergruppermissionRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsergrups::route('/'),
            'create' => CreateUsergrup::route('/create'),
            'view' => ViewUsergrup::route('/{record}'),
            'edit' => EditUsergrup::route('/{record}/edit'),
        ];
    }
}
