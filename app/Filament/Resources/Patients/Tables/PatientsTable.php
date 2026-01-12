<?php

namespace App\Filament\Resources\Patients\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class PatientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('patient_name')
                ->sortable()
                ->searchable()
                ,
                TextColumn::make('patient_email')
                ->sortable()
                ->limit(10)
                ,
                TextColumn::make('patient_phone')
                ->sortable()
                ->limit(11)
                ,
                TextColumn::make('patient_age')
                ->sortable()
                ,
                TextColumn::make('patient_diseases')
                ->sortable()
                ->limit(15)
                ,
                SpatieMediaLibraryImageColumn::make('patient_thumbnail')
                ->collection('thumbnails')
                ,
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
