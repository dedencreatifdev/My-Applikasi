<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Usergrups\UsergrupResource;
use App\Filament\Resources\Users\Pages\ManageUsers;
use App\Models\User;
use App\Models\Usergrup;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Hash;
use UnitEnum;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|UnitEnum|null $navigationGroup = 'User Management';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->unique(ignoreRecord: true)
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->dehydrateStateUsing(fn(string $state): string => Hash::make($state))
                    ->saved(fn(?string $state): bool => filled($state))
                    ->required(fn(string $operation): bool => $operation === 'create'),
                // Select::make('usergrup_id')
                //     ->options(Usergrup::query()->pluck('nama_grup', 'id'))
                //     ->required(),
                CheckboxList::make('roles')
                    ->relationship('roles', 'name')
                    ->searchable(),
            ])
            ->columns(1);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('email_verified_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->visibleFrom('sm')
                    ->dateTime()
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('detail')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                // ->url(function (User $record): string {
                //     return UsergrupResource::getUrl('view', ['record' => $record->userGrups->id]);
                // })
                ,
                ActionGroup::make([
                    ViewAction::make()
                        ->label('Detail')
                        ->color('info')
                        ->requiresConfirmation()
                        ->modalDescription('Berikut adalah detail dari user yang dipilih.'),
                    EditAction::make()
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalDescription('Edit informasi user yang dipilih.'),
                    DeleteAction::make()
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalDescription('Apakah Anda yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan.'),
                ])
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
            'index' => ManageUsers::route('/'),
        ];
    }
}
