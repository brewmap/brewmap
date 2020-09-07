<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view("home");
    }
}
