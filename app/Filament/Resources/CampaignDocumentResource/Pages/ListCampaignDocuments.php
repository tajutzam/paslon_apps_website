<?php

namespace App\Filament\Resources\CampaignDocumentResource\Pages;

use App\Filament\Resources\CampaignDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCampaignDocuments extends ListRecords
{
    protected static string $resource = CampaignDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
