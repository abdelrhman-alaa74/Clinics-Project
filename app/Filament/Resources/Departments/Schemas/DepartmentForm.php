<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make([
                    TextInput::make('department_title')
                    ->string()
                    ->maxLength(50)
                    ->required(),
                    Textarea::make('department_description')
                    ->string()
                    ->rows(10)
                    ->cols(20),
                ])
            ]);
    }
}
