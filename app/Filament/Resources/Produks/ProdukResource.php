<?php

namespace App\Filament\Resources\Produks;

use App\Filament\Resources\Produks\Pages\ManageProduks;
use App\Models\Produk;
use BackedEnum;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static string|UnitEnum|null $navigationGroup = 'Produk';
    protected static ?string $recordTitleAttribute = 'kode_produk';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_produk')
                    ->required(),
                TextInput::make('nama_produk')
                    ->placeholder('-')
                    ->columnSpan(2)
                    ->required(),
                Select::make('satuan')
                    ->required()
                    ->options([
                        'pcs' => 'Pcs',
                        'kg' => 'Kilogram',
                        'liter' => 'Liter',
                    ]),
                Select::make('kategory')
                    ->required()
                    ->options([
                        'pcs' => 'Pcs',
                        'kg' => 'Kilogram',
                        'liter' => 'Liter',
                    ]),
                Select::make('merk')
                    ->required()
                    ->options([
                        'pcs' => 'Pcs',
                        'kg' => 'Kilogram',
                        'liter' => 'Liter',
                    ]),
                Section::make('Harga dan Stok')
                    ->schema([
                        TextInput::make('harga')
                            ->required()
                            ->numeric()
                            ->default(0),
                        TextInput::make('stok')
                            ->required()
                            ->numeric()
                            ->default(0),

                    ])
                    ->columns(3)
                    ->columnSpanFull(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
            ])
            ->columns(3);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('kode_produk'),
                TextEntry::make('nama_produk'),
                TextEntry::make('satuan'),
                TextEntry::make('kategory'),
                TextEntry::make('merk'),
                TextEntry::make('deskripsi')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('harga')
                    ->numeric(),
                TextEntry::make('stok')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('kode_produk')
            ->columns([
                TextColumn::make('kode_produk')
                    ->searchable(),
                TextColumn::make('nama_produk')
                    ->searchable(),
                TextColumn::make('satuan')
                    ->searchable(),
                TextColumn::make('kategory')
                    ->searchable(),
                TextColumn::make('merk')
                    ->searchable(),
                TextColumn::make('harga')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('stok')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make()
                        ->label('Detail')
                        ->color('info')
                        ->requiresConfirmation()
                        ->modalDescription('Berikut adalah detail dari produk yang dipilih.'),
                    EditAction::make()
                        ->modalWidth('3xl')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalDescription('Edit informasi produk yang dipilih.'),
                    DeleteAction::make()
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalDescription('Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.'),

                ]),
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
            'index' => ManageProduks::route('/'),
        ];
    }
}
