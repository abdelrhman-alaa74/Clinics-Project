<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class topNavbarComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $contactInformation;
    public $generalInformation;
    public $socialInformation;
    public function __construct()
    {
        $this->contactInformation = Setting::where('group', 'contact')
        ->pluck('value' , 'key')
        ->toArray();

        $this->generalInformation = Setting::where('group', 'general')
        ->pluck('value' , 'key')
        ->toArray();

        $this->socialInformation = Setting::where('group', 'social_media')
        ->pluck('value' , 'key')
        ->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.top-navbar-component');
    }
}
