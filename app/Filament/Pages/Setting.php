<?php

namespace App\Filament\Pages;
use BackedEnum;

use App\Models\Setting as ModelsSetting;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class Setting extends Page implements HasForms
{
    use InteractsWithForms;
    protected string $view = 'filament.pages.setting';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cog6Tooth;

    public ?array $data = [];

    public ?string $activeGroup = null;

    public $groups;
public function mount(): void
{
    $settings = ModelsSetting::all();

    $groupedSettings = $settings->groupBy('group');
    
    $this->groups = $groupedSettings->keys()->toArray();

    foreach ($groupedSettings as $group => $items) {
        $this->data[$group] = $items->pluck('value', 'key')->toArray();
    }

    $this->activeGroup = !empty($this->groups) ? $this->groups[0] : null;
}

    public function save(): void
    {
        foreach ($this->data as $group => $settings) {
            foreach ($settings as $key => $value) {
                ModelsSetting::where('group', $group)
                    ->where('key', $key)
                    ->update([
                        'value' => $value,
                    ]);
            }
        }
        Notification::make()
        ->title('Edit Successfully')
        ->success()
        ->send();
    }
}
