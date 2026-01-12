<?php

namespace App\Filament\Resources\Doctors\Tables;

use App\Models\Department;
use App\Models\Doctor;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DoctorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('doctor_name')
                ->sortable()
                ->searchable()
                ,
                TextColumn::make('doctor_phone')
                ->sortable()
                ->limit(11)
                ,
                TextColumn::make('facebook')
                ->sortable()
                ->limit(5)
                ,
                TextColumn::make('twitter')
                ->sortable()
                ->limit(5)
                ,
                TextColumn::make('linkedin')
                ->sortable()
                ->limit(5)
                ,
                TextColumn::make('specialty')
                ->sortable()
                ,
                SpatieMediaLibraryImageColumn::make('doctor_avatar')
                ->collection('avatars')
                ,
                TextColumn::make('description')
                ->limit(10)
                ,
                TextColumn::make('department.department_title'),
            ])
            ->filters([
                SelectFilter::make('specialty')
                ->label('Specialty')
                ->multiple()
                ->options(Doctor::specialty())
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
