<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Latest extends Component
{
    public mixed $latestChanges;

    /**
     * Create a new component instance.
     */
    public function __construct($latestChanges)
    {
        $this->latestChanges = $latestChanges;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.latest', ['latest_changes' => $this->latestChanges]);
    }
}
