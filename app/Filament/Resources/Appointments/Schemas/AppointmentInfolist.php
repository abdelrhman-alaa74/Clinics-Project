<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filament\Forms\Components\RichEditor\TextColor;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Filament\Tables\Columns\TextColumn;

class AppointmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('App_name')
                ->size(TextSize::Large)
                ->weight('bold')
                ->color('primary')
                ,
                TextEntry::make('App_email')
                ->size(TextSize::Large)
                ->weight('bold')
                ->color('primary')
                ,
                TextEntry::make('date')
                ->size(TextSize::Large)
                ->weight('bold')
                ->date()
                ->color('primary')
                ,
                TextEntry::make('time')
                ->size(TextSize::Large)
                ->weight('bold')
                ->time()
                ->color('primary')
                ,
                TextEntry::make('department.department_title')
                ->size(TextSize::Large)
                ->weight('bold')
                ->color('primary')
                ,
                TextEntry::make('doctor.doctor_name')
                ->size(TextSize::Large)
                ->weight('bold')
                ->color('primary')
                ,
            ]);
    }
}
