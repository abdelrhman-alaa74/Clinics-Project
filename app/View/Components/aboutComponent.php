<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class aboutComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $aboutInfo;
    public function __construct()
    {
        $this->aboutInfo = Setting::where('group', 'about')
            ->pluck('value', 'key')
            ->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about-component');
    }
}
