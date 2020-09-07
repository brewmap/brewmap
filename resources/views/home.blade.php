<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css" integrity="sha512-8Tb+T7SKUFQWOPIQCaLDWWe1K/SY8hvHl7brOH8Nz5z1VT8fnf8B+9neoUzmFY3OzkWMMs3OjrwZALgB1oXFBg==" crossorigin="anonymous">
        <title>Brewmap</title>
        <style>
            #landing {
                background-image: url("{{ asset("/images/landing-map.jpg") }}");
            }
        </style>
    </head>
    <body class="h-full">
        <div class="flex flex-col min-h-screen w-full bg-cover bg-no-repeat" id="landing">
            <div class="w-full shadow-2xl bg-black bg-opacity-75 p-4">
                <div class="flex items-end container mx-auto text-white">
                    <a href="#" class="px-4 py-2 mr-4 leading-none font-bold text-xl">Brewmap</a>
                    <a href="#" class="px-4 py-2 mr-4 leading-none">About</a>
                    <a href="#" class="px-4 py-2 mr-4 leading-none">Breweries</a>
                    <a href="#" class="px-4 py-2 mr-4 leading-none">Countries</a>
                    <div class="flex-1 flex flex-row-reverse">
                        <a href="#" class="px-4 py-2 ml-4 leading-none border rounded border-white hover:bg-white hover:bg-opacity-25">Log in</a>
                    </div>
                </div>
            </div>

            <div class="flex-1 container mx-auto flex items-center justify-center">
                <div class="w-3/4 shadow-2xl bg-black bg-opacity-75 p-12">
                    <label for="search"></label>
                    <input class="w-full appearance-none rounded py-2 px-3 text-3xl text-gray-700" id="search" type="text" placeholder="Search breweries, cities, countries...">
                </div>
            </div>
        </div>
        <div class="bg-black shadow-2xl text-sm text-gray-500 p-4">
            <div class="container mx-auto flex">
                <div class="flex-1">
                    brewmap 2020
                </div>
                <div class="flex-1 flex flex-row-reverse">
                    <i class="large facebook icon"></i>
                    <i class="large github icon"></i>
                </div>
            </div>
        </div>
    </body>
</html>
