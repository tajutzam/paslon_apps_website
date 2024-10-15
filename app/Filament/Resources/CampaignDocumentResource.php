<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampaignDocumentResource\Pages;
use App\Filament\Resources\CampaignDocumentResource\RelationManagers;
use App\Models\CampaignDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class CampaignDocumentResource extends Resource
{
    protected static ?string $model = CampaignDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('campaign_id')
                    ->relationship('campaign', 'title') // Menggunakan relasi dengan model Campaign
                    ->required(),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('file_path')
                    ->required()
                    ->directory('campaign-documents')
                    ->acceptedFileTypes(['image/*', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']) // Mengizinkan jenis file gambar dan dokumen
                    ->maxSize(1024 * 5) // Maksimal ukuran file 5MB
                    ->preserveFilenames() // Menyimpan nama asli file
                    ->required(),
                Forms\Components\Textarea::make('summary')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('campaign.title') // Menampilkan judul kampanye
                    ->label('Kampanye')
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                ImageColumn::make('file_path')->height(150),
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
                // Tambahkan filter jika diperlukan
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
            // Tambahkan relasi jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCampaignDocuments::route('/'),
            'create' => Pages\CreateCampaignDocument::route('/create'),
            'edit' => Pages\EditCampaignDocument::route('/{record}/edit'),
        ];
    }
}
