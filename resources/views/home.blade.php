<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ mix("/css/app.css") }}" rel="stylesheet">
        <link rel="icon" href="{{ asset("/images/logo.png") }}">
        <title>Brewmap</title>
    </head>
    <body class="h-full">
        <div class="bg-yellow-500 shadow-2xl p-1"></div>

        <div class="flex flex-col min-h-screen w-full bg-cover bg-no-repeat" id="landing">
            <div class="w-full shadow-2xl bg-black bg-opacity-75 p-4">
                <div class="flex items-center container mx-auto text-white">
                    <a href="#" class="px-4 py-2">
                        <img class="w-8" src="{{ asset("/images/logo.png") }}" alt="Brewmap">
                    </a>
                    <a href="#" class="px-4 py-2 mr-4 leading-none font-bold text-xl">
                        Brewmap
                    </a>
                    <a href="#" class="px-4 py-2 mr-4 leading-none">About</a>
                    <a href="#" class="px-4 py-2 mr-4 leading-none">Breweries</a>
                    <a href="#" class="px-4 py-2 mr-4 leading-none">Countries</a>
                    <div class="flex-1 flex flex-row-reverse">
                        <a href="#" class="px-4 py-2 ml-4 leading-none border rounded border-white hover:bg-white hover:bg-opacity-25">Log in</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-yellow-500 shadow-2xl p-16">
            <div class="mx-auto container">
                <div class="flex text-center leading-tight">
                    @foreach($numbers as $number)
                        <div class="flex-1 bg-white rounded-lg mx-8 p-8">
                            <div class="text-6xl">{{ $number["value"] }}</div>
                            {{ $number["label"] }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bg-white shadow-2xl p-32">
            <div class="mx-auto container">
                <div class="flex-1">
                    <h3 class="text-3xl font-bold">What is Brewmap?</h3>
                    <p class="py-4 leading-loose">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias, beatae debitis delectus
                        earum hic itaque, labore laborum maxime nihil nostrum odio quas quos ratione reiciendis sequi
                        suscipit ullam velit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem doloribus
                        expedita, laborum quae vitae voluptate voluptatum! Cumque dolorum error magnam mollitia provident
                        repellat saepe tenetur ullam. Autem distinctio error pariatur? Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Animi aperiam atque commodi cumque deleniti distinctio, eveniet id
                        labore magni nam neque nihil odio omnis quam quod similique temporibus ullam voluptatibus. Lorem
                        ipsum dolor sit amet, consectetur adipisicing elit. Minima odio officia quisquam temporibus ut.
                        Architecto beatae cum dolor eaque et inventore iure iusto, minima praesentium quibusdam reiciendis,
                        sequi ullam voluptatem?
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-black shadow-2xl text-sm text-gray-500 p-4">
            <div class="container mx-auto flex items-center">
                <div class="flex-1">
                    brewmap 2020
                </div>
                <div class="flex-1 flex items-center flex-row-reverse">
                    <i class="px-1 fab fa-2x fa-facebook"></i>
                    <i class="px-1 fab fa-2x fa-github"></i>
                </div>
            </div>
        </div>

        <div class="bg-yellow-500 shadow-2xl p-1"></div>
    </body>
</html>
