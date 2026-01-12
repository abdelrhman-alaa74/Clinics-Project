<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Icons\IconManager;
use Guava\IconPicker\Forms\Components\IconPicker;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                IconPicker::make('icon')
                ->required()
                ,
                TextInput::make('service_title')
                ->required()
                ->string()
                ->maxLength(30),
                Textarea::make('service_description')
                ->required()
                ->string()
                ,
            ]);
    }
}
