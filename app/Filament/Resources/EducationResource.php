<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationResource\Pages;
use App\Models\Education;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open'; // Ikon navigasi

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('candidate_id')
                    ->relationship('candidate', 'name')
                    ->required(),
                Forms\Components\TextInput::make('degree')
                    ->required()
                    ->maxLength(255), // Gelar
                Forms\Components\TextInput::make('institution')
                    ->required()
                    ->maxLength(255), // Institusi pendidikan
                Forms\Components\TextInput::make('year_of_graduation')
                    ->required()
                    ->numeric() // Tahun lulus
                    ->minValue(1900) // Batas minimal tahun
                    ->maxValue(date('Y')), // Batas maksimal tahun
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('candidate.name') // Menampilkan nama kandidat
                    ->label('Kandidat')
                    ->sortable(),
                Tables\Columns\TextColumn::make('degree') // Gelar
                    ->searchable(),
                Tables\Columns\TextColumn::make('institution') // Institusi pendidikan
                    ->searchable(),
                Tables\Columns\TextColumn::make('year_of_graduation') // Tahun lulus
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at') // Tanggal dibuat
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at') // Tanggal diperbarui
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
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
            // Tambahkan relasi jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEducation::route('/'),
            'create' => Pages\CreateEducation::route('/create'),
            'edit' => Pages\EditEducation::route('/{record}/edit'),
        ];
    }
}
