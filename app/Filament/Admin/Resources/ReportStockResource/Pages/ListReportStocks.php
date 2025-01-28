<?php

namespace App\Filament\Admin\Resources\ReportStockResource\Pages;

use App\Filament\Admin\Resources\ReportStockResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportStocks extends ListRecords
{
    protected static string $resource = ReportStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Data Baru'),
        ];
    }
}
