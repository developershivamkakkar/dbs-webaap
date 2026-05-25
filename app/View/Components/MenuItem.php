<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuItem extends Component
{
    /**
     * The menu item instance.
     */
    public $menuItem;

    /**
     * Create a new component instance.
     *
     * @param $menuItem
     */
    public function __construct($menuItem)
    {
        $this->menuItem = $menuItem;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.menu-item');
    }
}
