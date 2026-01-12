<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make([
                    TextInput::make('contact_name')
                    ->label('Name')
                    ->required()
                    ->string()
                    ,
                    TextInput::make('contact_email')
                    ->label('Email')
                    ->required()
                    ->string()
                    ,
                    TextInput::make('contact_subject')
                    ->label('Subject')
                    ->nullable()
                    ->string()
                    ,
                    Textarea::make('contact_message')
                    ->label('Message')
                    ->required()
                    ->string()
                    ->rows(5)
                    ->cols(5)
                    ,
                ])
            ]);
    }
}
