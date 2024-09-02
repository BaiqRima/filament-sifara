<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FasilitasResource\Pages;
use App\Filament\Resources\FasilitasResource\RelationManagers;
use App\Models\Fasilitas;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FasilitasResource extends Resource
{
    protected static ?string $model = Fasilitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_instansi')
                    ->relationship(name: 'instansi', titleAttribute: 'nama_instansi'),
                Forms\Components\TextInput::make('nama_fasilitas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('deskripsi_fasilitas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kondisi')
                    ->required()
                    ->maxLength(255),
                Select::make('jenis')
                    ->options([
                        'Ruangan' => 'Ruangan',
                        'Alat' => 'Alat',
                        'Kendaraan' => 'Kendaraan',
                    ]),
                FileUpload::make('foto')
                    ->disk('public')
                    ->directory('foto-ruangan')
                    ->acceptedFileTypes(['image/jpg','image/jpeg', 'image/png'])

                    // ->directory('foto-ruangan')
                    // ->acceptedFileTypes(['application/pdf','image/jpeg'])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_fasilitas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi_fasilitas')
                    ->searchable()
                    // ->listWithLineBreaks()
                    // ->bulleted()
                    ->wrap(),
                Tables\Columns\TextColumn::make('kondisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis')
                    ->searchable(),    
                ImageColumn::make('foto')
                    ->disk('public')  // Pastikan disk ini dikonfigurasi dengan benar
                    // ->path('foto-ruangan')  // Path relatif di disk
                    // ->alt('Foto Fasilitas')
                    ->width(350)
                    ->height(200),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListFasilitas::route('/'),
            'create' => Pages\CreateFasilitas::route('/create'),
            'edit' => Pages\EditFasilitas::route('/{record}/edit'),
        ];
    }
}
