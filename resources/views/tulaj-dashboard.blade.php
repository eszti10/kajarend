<form action="/tulaj-dashboard" method="POST">
    @csrf

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tulaj kaja felvitel</title>
        <link rel="stylesheet" href="{{asset('css/stilus.css')}}">
    </head>
    @csrf

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 align="center"><a href="/rendeleslista" class="button">Rendelések listázása</a></h1>
                    <h1 align="center"><a href="/etels" class="button">Ételek szerkesztése/listázása</a></h1>
                    <h1 align="center"><a href="/etels/create" class="button">Új étel felvétele</a></h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
