<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class Hero extends Page implements HasForms
{
    use InteractsWithForms;
    protected string $view = 'filament.pages.hero';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::HomeModern;
    protected static ?string $title = 'Hero Information';

    public $data = [];

    public function mount(){
        $setting = Setting::where('group' , 'hero')->pluck('value' , 'key')->toArray();
        
        $this->form->fill([
            'hero_head' => $setting['hero_head'] ?? "",
            'hero_title' => $setting['hero_title'] ?? ""
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Hero')
                    ->description('Landing Page')
                    ->schema([
                        TextInput::make('hero_head')
                            ->required()
                            ->label('Hero Head')
                        ,
                        TextInput::make('hero_title')
                            ->required()
                            ->label('Hero Title')
                        ,
                    ])->columns(2)
            ])->statePath('data')
            ;
    }


    public function submit(){
        $state = $this->form->getState();


        foreach($state as $key=>$value){
            Setting::updateOrCreate([
                'group' => 'hero',
                'key' => $key,
            ],
            [
                    'value' => $value
            ]
        );
        }

        Notification::make()
            ->title('Updated Successfully')
            ->success()
            ->send();

    }

}
