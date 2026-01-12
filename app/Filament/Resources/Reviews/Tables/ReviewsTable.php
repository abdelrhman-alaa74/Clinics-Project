<?php

namespace App\Filament\Resources\Reviews\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('RName')
                ->label('Reviewer Name')
                ->searchable()
                ->sortable()
                ,
                TextColumn::make('content')
                ->limit(30)
                ,
                SpatieMediaLibraryImageColumn::make('thumbnail')
                ->collection('thumbnails')
                ,
                TextColumn::make('created_at')
                ->label('Create At')
                ->dateTime()
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
