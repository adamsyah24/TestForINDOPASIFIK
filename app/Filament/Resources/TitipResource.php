<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TitipResource\Pages;
use App\Filament\Resources\TitipResource\RelationManagers;
use App\Models\Titip;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TitipResource extends Resource
{
    protected static ?string $model = Titip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kendaraan_id')->relationship('tKendaraan', 'nama')->unique()->label('Nama Kendaraan')->reactive(),
                Forms\Components\DatePicker::make('tgl_titip')->label('Tanggal Titip'),
                Forms\Components\DatePicker::make('tgl_berakhir')->label('Tanggal Berakhir'),
                TextInput::make('harga_sewa')->label('Harga Sewa')->numeric()->prefix('Rp.')->integer(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tKendaraan.nama', 'nama')->label('Nama Kendaraan'),
                TextColumn::make('harga_sewa')->sortable(),
                TextColumn::make('tgl_titip'),
                TextColumn::make('tgl_berakhir'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTitips::route('/'),
            'create' => Pages\CreateTitip::route('/create'),
            'edit' => Pages\EditTitip::route('/{record}/edit'),
        ];
    }
}
