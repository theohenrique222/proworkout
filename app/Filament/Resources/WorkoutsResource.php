<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkoutsResource\Pages;
use App\Models\Workout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class WorkoutsResource extends Resource
{
    protected static ?string $model = Workout::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                Select::make('category')
                    ->options([
                        'Force' => 'Force',
                        'Resistance' => 'Resistance',
                        'Functional' => 'Functional',
                    ])
                    ->required()
                        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('category'),
                TextColumn::make('created_at')
                    ->dateTime('d/m/Y'),
                TextColumn::make('updated_at')
                    ->dateTime('d/m/Y'),
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
