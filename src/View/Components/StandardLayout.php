<?php

namespace Laracasts\Holodeck\View\Components;

use Illuminate\View\Component;

class StandardLayout extends Component
{
    public function render()
    {
        return view('layouts.standard');
    }
}