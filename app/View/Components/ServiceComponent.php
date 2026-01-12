<?php

namespace App\View\Components;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $services;
    public function __construct()
    {
        $this->services = Service::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.service-component');
    }
}
