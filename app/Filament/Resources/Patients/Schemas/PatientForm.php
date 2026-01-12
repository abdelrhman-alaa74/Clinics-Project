<?php

namespace App\Filament\Resources\Patients\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PatientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('patient_name')
                ->required()
                ,
                TextInput::make('patient_email')
                ->nullable()
                ->email()
                ,
                TextInput::make('patient_phone')
                ->nullable()
                ->numeric()
                ,
                TextInput::make('patient_age')
                ->nullable()
                ->numeric()
                ,
                TagsInput::make('patient_diseases')
                ->nullable()
                ->suggestions([
                    'Diabetes',
                    'Hypertension', 
                    'Asthma', 
                    'Heart Disease',   
                    'Chronic Kidney Disease',
                    'Arthritis',
                    'Chronic Obstructive Pulmonary Disease (COPD)',   
                    'Cancer',          
                    'Alzheimer\'s Disease', 
                    'Hepatitis B or C', 
                    ])
                    ->separator(',')
                    ,
                    SpatieMediaLibraryFileUpload::make('patient_thumbnail')
                    ->collection('thumbnails')
                    ->image()
                    ->nullable()
                    ,
                ]);
            }
        }
