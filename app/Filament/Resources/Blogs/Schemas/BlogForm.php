<?php

namespace App\Filament\Resources\Blogs\Schemas;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('writer')
                ->required()
                ->string()
                ->maxLength(30)
                ,
                TextInput::make('blog_title')
                ->required()
                ->string()
                ->maxLength(50)
                ,
                Textarea::make('blog_description')
                ->required()
                ->string()
                ->rows(10)
                ->cols(5)
                ,
                TextInput::make('views')
                ->nullable()
                ->numeric()
                ->default(0)
                ,
                SpatieMediaLibraryFileUpload::make('blogImage')
                ->image()
                ->collection('blogImage')
                ->disk('public')
                ->visibility('public')
                ->nullable()
                ,
                Select::make('user_id')
                ->label('User')
                ->options(User::pluck('name'))
                ->required()
            ]);
    }
}
