<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkoutsResource\Pages;
use App\Filament\Resources\WorkoutsResource\RelationManagers;
use App\Models\Workouts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class WorkoutsResource extends Resource
{
    protected static ?string $model = Workouts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('exercise')
                    ->required(),
                Select::make('muscleGroup')
                    ->options([
                        'breastplate' => 'breastplate',
                        'back' => 'back',
                        'arms' => 'arms',
                    ])
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkouts::route('/'),
            'create' => Pages\CreateWorkouts::route('/create'),
            'edit' => Pages\EditWorkouts::route('/{record}/edit'),
        ];
    }
}
