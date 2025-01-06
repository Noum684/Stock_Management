<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButtons extends Component
{
    /**
     * Create a new component instance.
     */
    public $show;
    public $edit;
    public $delete;

    public function __construct($show = '#', $edit = '#', $delete = '#')
    {
        $this->show = $show;
        $this->edit = $edit;
        $this->delete = $delete;
    }

    public function render()
    {
        return view('components.action-buttons');
    }
}
