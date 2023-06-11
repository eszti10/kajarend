<link rel="stylesheet" type="text/css" href="{{ url('/css/kajarend.css') }}" />
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Futár ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Dátum</th>
                                <th scope="col">Név</th>
                                <th scope="col">Cím</th>
                                <th scope="col">Állapot</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dbh as $sor)
                                <tr>
                                    <td>{{$sor->datum }}</td>
                                    <td>{{$sor->nev }}</td>
                                    <td>{{$sor->cim }}</td>
                                    <td>{{$sor->statusznev }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Kiszállítás</button>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>




                </div>
            </div>
        </div>
    </div>

</x-app-layout>
