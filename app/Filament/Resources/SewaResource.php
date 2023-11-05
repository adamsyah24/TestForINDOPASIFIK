<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SewaResource\Pages;
use App\Filament\Resources\SewaResource\RelationManagers;
use App\Models\Sewa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class SewaResource extends Resource
{
    protected static ?string $model = Sewa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kendaraan_id')->relationship('sKendaraan', 'nama')->unique()->label('Nama Kendaraan')->reactive(),
                Forms\Components\DatePicker::make('tgl_awal')->label('Tanggal Awal'),
                Forms\Components\DatePicker::make('tgl_akhir')->label('Tanggal Akhir'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sKendaraan.nama', 'nama')->label('Nama Kendaraan'),
                TextColumn::make('tgl_awal'),
                TextColumn::make('tgl_akhir'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSewas::route('/'),
            'create' => Pages\CreateSewa::route('/create'),
            'edit' => Pages\EditSewa::route('/{record}/edit'),
        ];
    }
}
