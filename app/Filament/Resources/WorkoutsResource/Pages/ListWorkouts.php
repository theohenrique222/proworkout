<?php

namespace App\Filament\Resources\WorkoutsResource\Pages;

use App\Filament\Resources\WorkoutsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkouts extends ListRecords
{
    protected static string $resource = WorkoutsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
