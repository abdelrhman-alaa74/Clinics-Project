<?php

namespace App\Filament\Resources\Blogs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('writer')
                ->searchable()
                ->sortable()
                ,
                TextColumn::make('blog_title')
                ->searchable()
                ->sortable()
                ,
                TextColumn::make('blog_description')
                ->limit(30)
                ,
                TextColumn::make('views')
                ,
                SpatieMediaLibraryImageColumn::make('blogImage')
                ->collection('blogImage')
                ,
                TextColumn::make('user_id')
                ->label('Writer')
                ->searchable()
                ->sortable()
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
