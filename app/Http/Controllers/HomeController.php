<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $numbers = [
            [
                "label" => "breweries",
                "value" => 1138,
            ],
            [
                "label" => "visits",
                "value" => 4400,
            ],
            [
                "label" => "reviews",
                "value" => 128,
            ],
            [
                "label" => "users",
                "value" => 666,
            ],
        ];

        return view("home")->with("numbers", $numbers);
    }
}
