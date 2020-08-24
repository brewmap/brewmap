<?php

namespace Brewmap\Nova\Tools;

use Laravel\Nova\Tool;
use Illuminate\View\View;

class TelescopeLink extends Tool
{
    public function renderNavigation(): View
    {
        return view('nova.telescope-link');
    }
}