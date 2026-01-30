<?php

namespace App\Filament\Resources\Levels;

use App\Filament\Resources\Levels\Pages\ManageLevels;
use App\Models\Level;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class LevelResource extends Resource
{
    protected static ?string $model = Level::class;

    protected static string|UnitEnum|null $navigationGroup = 'User Management';

    protected static ?string $recordTitleAttribute = 'nama_level';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_level')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
            ])
            ->columns(1);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_level'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_level')
            ->columns([
                TextColumn::make('nama_level')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('permisAny')
                    ->action(function (Level $record) {
                        //
                        $permisions = $record->permissions;
                        dd($permisions);
                    })
                    ->button()
                    ->color('warning')
                    ->label('Aksi')
                    ->icon(Heroicon::ShieldExclamation),
                ViewAction::make()
                    ->label('Detail')
                    ->color('info')
                    ->requiresConfirmation()
                    ->modalDescription('Berikut adalah detail dari level yang dipilih.'),
                EditAction::make()
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalDescription('Edit informasi level yang dipilih.'),
                DeleteAction::make()
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalDescription('Apakah Anda yakin ingin menghapus level ini? Tindakan ini tidak dapat dibatalkan.'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageLevels::route('/'),
        ];
    }
}
