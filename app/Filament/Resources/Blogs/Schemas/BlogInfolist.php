<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;

class BlogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('writer')
                ->size(TextSize::Large)
                ->weight('bold')
                ->color('primary')
                ,
                TextEntry::make('blog_title')
                ->size(TextSize::Large)
                ->weight('bold')
                ->color('primary')
                ,
                Group::make([
                TextEntry::make('blog_description')
                ->size(TextSize::Large)
                ->weight('bold')
                ->color('primary')
                ,
                TextEntry::make('views')
                ->size(TextSize::Large)
                ->weight('bold')
                ->color('primary')
                ,
                ])->columnSpan(2)
                ,
                
            ]);
    }
}
