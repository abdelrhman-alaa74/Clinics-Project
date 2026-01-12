<?php

namespace App\View\Components;

use App\Models\Blog;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $blogInfo;
    public function __construct()
    {
        $this->blogInfo = Blog::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-component');
    }
}
