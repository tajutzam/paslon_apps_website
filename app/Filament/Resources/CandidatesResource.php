<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CandidatesResource\Pages;
use App\Filament\Resources\CandidatesResource\RelationManagers;
use App\Models\Candidate;
use App\Models\Candidates;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CandidatesResource extends Resource
{
    protected static ?string $model = Candidate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')->columnSpanFull(),
                FileUpload::make('image')
                    ->directory('image-candidates')
                    ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg'])
                    ->required(),
                TextInput::make('party')->placeholder('Masukan Partai')->required(),
                TextInput::make('birthdate')->type('date')->placeholder('MM/DD/YYYY')->required(),
                TextInput::make('position')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Name')->sortable(),
                Tables\Columns\TextColumn::make('party')->label('Party')->sortable(),
                Tables\Columns\TextColumn::make('birthdate')->label('Birthdate')->sortable(),
                Tables\Columns\TextColumn::make('position')->label('Position')->sortable(),
                ImageColumn::make('image')->label('Image'),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCandidates::route('/'),
            'create' => Pages\CreateCandidates::route('/create'),
            'edit' => Pages\EditCandidates::route('/{record}/edit'),
        ];
    }
}
