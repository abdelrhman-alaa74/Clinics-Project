<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;

class ReviewInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('RName')
                ->label('Reviewer Name')
                ->size(TextSize::Large)
                ->weight('bold')
                ->color('primary')
                ,
                TextEntry::make('content')
                ->label('Content')
                ->size(TextSize::Large)
                ->weight('bold')
                ->color('primary')
                ,
                SpatieMediaLibraryImageEntry::make('thumbnail')
                ->collection('thumbnails')
            ]);
    }
}
