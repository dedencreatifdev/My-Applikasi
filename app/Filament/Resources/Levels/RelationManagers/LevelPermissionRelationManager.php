<?php

namespace App\Filament\Resources\Levels\RelationManagers;

use Filament\Actions\AttachAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LevelPermissionRelationManager extends RelationManager
{
    protected static string $relationship = 'LevelPermission';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                CheckboxColumn::make('lihat')
                    ->label('Lihat'),
                CheckboxColumn::make('tambah')
                    ->label('Tambah'),
                CheckboxColumn::make('ubah')
                    ->label('Ubah'),
                CheckboxColumn::make('hapus')
                    ->label('Hapus'),
                CheckboxColumn::make('detail')
                    ->label('Detail'),
                CheckboxColumn::make('import')
                    ->label('Import'),
                CheckboxColumn::make('export')
                    ->label('Export'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AttachAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DetachAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DetachBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
