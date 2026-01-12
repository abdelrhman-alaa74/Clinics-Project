<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('RName')
                ->label('Reviewer Name')
                ->required()
                ->string()
                ->maxLength(50)
                ,
                Textarea::make('content')
                ->label('Content')
                ->rows(5)
                ->cols(5)
                ->string()
                ->required()
                ,
                SpatieMediaLibraryFileUpload::make('thumbnail')
                ->nullable()
                ->image()
                ->collection('thumbnails')
                ,
            ]);
    }
}
