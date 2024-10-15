<?php

namespace App\Filament\Resources\CampaignDocumentResource\Pages;

use App\Filament\Resources\CampaignDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCampaignDocument extends EditRecord
{
    protected static string $resource = CampaignDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
