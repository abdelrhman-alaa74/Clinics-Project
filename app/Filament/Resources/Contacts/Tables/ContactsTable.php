<?php

namespace App\Filament\Resources\Contacts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('contact_name')
                ->label('Name')
                ,
                TextColumn::make('contact_email')
                ->label('Email')
                ->limit(10)
                ,
                TextColumn::make('contact_subject')
                ->label('Subject')
                ->limit(10)
                ,
                TextColumn::make('contact_message')
                ->label('Message')
                ->limit(20)
                ,
                TextColumn::make('created_at')
                ->label('Created At')
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
