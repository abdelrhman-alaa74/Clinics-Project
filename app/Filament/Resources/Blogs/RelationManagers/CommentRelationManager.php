<?php

namespace App\Filament\Resources\Blogs\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CommentRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('comment_writer')
                    ->required()
                    ->maxLength(255),
                TextInput::make('comment_content')
                    ->required()
                    ,
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('comment_writer')
            ->columns([
                TextColumn::make('comment_writer')
                    ->searchable(),
                TextColumn::make('comment_content')
                ,
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
