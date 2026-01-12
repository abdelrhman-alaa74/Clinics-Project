<?php

namespace App\View\Components;

use App\Models\Package;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PricingComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $packages;
    public function __construct()
    {
        $this->packages = Package::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pricing-component');
    }
}
