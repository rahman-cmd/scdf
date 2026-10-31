<?php

namespace App\Filament\Resources\ValueCards\Pages;

use App\Filament\Resources\ValueCards\ValueCardResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListValueCards extends ListRecords
{
    protected static string $resource = ValueCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
