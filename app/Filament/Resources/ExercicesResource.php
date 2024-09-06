<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExercicesResource\Pages;
use App\Filament\Resources\ExercicesResource\RelationManagers;
use App\Models\Exercise;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExercicesResource extends Resource
{
    protected static ?string $model = Exercise::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('exercises')
                    ->required(),
                TextInput::make('series'),
                TextInput::make('repetitions'),
                TextInput::make('weight'),
                TextInput::make('rest'),

                Select::make('workout_id')
                    ->label('Workout')
                    ->relationship('workout', 'name') // A relação e o campo que será exibido
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('exercises'),
                TextColumn::make('series'),
                TextColumn::make('repetitions'),
                TextColumn::make('weight'),
                TextColumn::make('rest'),
                TextColumn::make('workout_id')
                ->label('Workout'),
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
            'index' => Pages\ListExercices::route('/'),
            'create' => Pages\CreateExercices::route('/create'),
            'edit' => Pages\EditExercices::route('/{record}/edit'),
        ];
    }
}
