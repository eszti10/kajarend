<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rendelések') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table border=5 style="">
                        <tr>
                            <th>Rendelés azonosítója</th>
                            <th>Étel neve</th>
                            <th>Darab szám</th>
                            <th>Étterem neve</th>
                            <th>Rendelő</th>
                        </tr>
                        @for ($i = 0; $i < count($rendelestetels); $i++)

                        <tr>
                            <td>{{ $rendelestetels[$i]->rendelesID }}</td>
                            <td>{{ $rendelestetels[$i]->enev }}</td>
                            <td>{{ $rendelestetels[$i]->darab }}</td>
                            <td>{{ $rendelestetels[$i]->etnev }}</td>
                            <td>{{ $rendelestetels[$i]->unev }}</td>
                        </tr>
                        @endfor
                    </table>
                    <a href="/rendeleslista">Vissza az a megrendelésekhez</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
