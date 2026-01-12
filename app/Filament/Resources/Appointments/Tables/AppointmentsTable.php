<?php

namespace App\Filament\Resources\Appointments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AppointmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('App_name')
                ->label('Name')
                ->searchable()
                ->sortable()
                ,
                TextColumn::make('App_email')
                ->label('Email')
                ->searchable()
                ->limit(10)
                ,
                TextColumn::make('date')
                ->label('Date')
                ->sortable()
                ,
                TextColumn::make('time')
                ->label('Time')
                ->sortable()
                ,
                TextColumn::make('department.department_title')
                ->label('Department Name')
                ->searchable()
                ->sortable()
                ,
                TextColumn::make('doctor.doctor_name')
                ->label('Doctor Name')
                ->searchable()
                ->sortable()
                ,

            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                // EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
