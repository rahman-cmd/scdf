<?php

namespace App\Filament\Resources\ValueCards\Pages;

use App\Filament\Resources\ValueCards\ValueCardResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditValueCard extends EditRecord
{
    protected static string $resource = ValueCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
