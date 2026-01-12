<?php

namespace App\View\Components;

use App\Models\Doctor;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class teamComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $teamInfo;
    public function __construct()
    {
        $this->teamInfo = Doctor::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.team-component');
    }
}
