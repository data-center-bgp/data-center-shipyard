<?php

namespace App\Filament\Admin\Resources\VesselResource\Pages;

use App\Filament\Admin\Resources\VesselResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVessels extends ListRecords
{
    protected static string $resource = VesselResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
