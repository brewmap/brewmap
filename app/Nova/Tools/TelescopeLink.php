<?php

declare(strict_types=1);

namespace Brewmap\Nova\Tools;

use Illuminate\View\View;
use Laravel\Nova\Tool;

class TelescopeLink extends Tool
{
    public function renderNavigation(): View
    {
        return view('nova.telescope-link');
    }
}
