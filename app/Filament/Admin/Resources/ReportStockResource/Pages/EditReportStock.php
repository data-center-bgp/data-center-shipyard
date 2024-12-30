<?php

namespace App\Filament\Admin\Resources\ReportStockResource\Pages;

use App\Filament\Admin\Resources\ReportStockResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReportStock extends EditRecord
{
    protected static string $resource = ReportStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
