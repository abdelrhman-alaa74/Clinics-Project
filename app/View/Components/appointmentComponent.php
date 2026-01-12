<?php

namespace App\View\Components;

use App\Models\Department;
use App\Models\Doctor;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class appointmentComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $doctors;
    public $departments;
    public function __construct()
    {
        $this->doctors = Doctor::all();
        $this->departments = Department::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.appointment-component');
    }
}
