<?php

namespace App\Filament\Resources\ExercicesResource\Pages;

use App\Filament\Resources\ExercicesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExercices extends ListRecords
{
    protected static string $resource = ExercicesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
