<?php

namespace App\Filament\Resources\Packages\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('progress_title')
                ->required()
                ->string()
                ->maxLength(50)
                ,
                TextInput::make('progress_salary')
                ->required()
                ->numeric()
                ,
                TagsInput::make('progress_description')
                ->required()
                ->columnSpan(2)
                ,
                SpatieMediaLibraryFileUpload::make('image')
                ->label('Package')
                ->disk('public')
                ->visibility('public')
                ->collection('packageImage')
                ->image()
                ,
            ]);
    }
}
