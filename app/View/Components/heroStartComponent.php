<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class heroStartComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $heroInfo;
    public function __construct()
    {
        $this->heroInfo = Setting::where('group', 'hero')
        ->pluck('value', 'key')
        ->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero-start-component');
    }
}
