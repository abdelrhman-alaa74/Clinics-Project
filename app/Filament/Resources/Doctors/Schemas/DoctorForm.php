<?php

namespace App\Filament\Resources\Doctors\Schemas;

use App\Models\Department;
use App\Models\Doctor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class DoctorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('doctor_name')
                ->string()
                ->maxLength(50)
                ->minLength(3)
                ->required(),
                TextInput::make('doctor_phone')
                ->numeric()
                ->nullable(),
                TextInput::make('facebook')
                ->string()
                ->nullable(),
                TextInput::make('twitter')
                ->string()
                ->nullable(),
                TextInput::make('linkedin')
                ->string()
                ->nullable(),
                Select::make('specialty')
                ->string()
                ->required()
                ->label('specialty')
                ->options(Doctor::specialty())
                ,
                SpatieMediaLibraryFileUpload::make('doctor_avatar')
                ->collection('avatars')
                ->image()
                ->disk('public')
                ->visibility('public')
                ->nullable()
                ,
                Textarea::make('description')
                ->required()
                ->string()
                ->rows(5)
                ->cols(5),
                // Select::make('department_id')
                // ->label('Department')
                //     ->options(Department::query()->pluck( 'department_title'))
                Select::make('department_id')
                ->relationship('department' , 'department_title')
                ->preload()
                ->required(),
            ]);
    }
}
