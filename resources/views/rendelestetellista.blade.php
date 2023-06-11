<link rel="stylesheet" type="text/css" href="{{ url('/css/kajarend.css') }}" />
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rendelések') }}

            @if ($jelenjog[0]->jognev == 'user')
                @if (count($total)==0)
                    0
                @else
                    Összeg: {{ $total[0]->tot }} Ft
                @endif
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($jelenjog[0]->jognev == 'user')
                        <table border=5 style="">
                            <tr>
                                <th>Étel neve</th>
                                <th>Darab szám</th>
                                <th>Étterem neve</th>
                            </tr>

                            @for ($i = 0; $i < count($rendelestetels); $i++)
                                <tr>
                                    <td>{{ $rendelestetels[$i]->enev }}</td>
                                    <td>{{ $rendelestetels[$i]->darab }}</td>
                                    <td>{{ $rendelestetels[$i]->etnev }}</td>
                                </tr>
                            @endfor
                            </table>
                    @endif
                    @if ($jelenjog[0]->jognev == 'admin')

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
                    @endif
                    @if ($jelenjog[0]->jognev == 'tulaj')

                        <table border=5 style="">
                            <tr>
                                <th>Étel neve</th>
                                <th>Darab szám</th>
                                <th>Rendelő</th>
                            </tr>
                            @for ($i = 0; $i < count($rendelestetels); $i++)
                                <tr>
                                    <td>{{ $rendelestetels[$i]->enev }}</td>
                                    <td>{{ $rendelestetels[$i]->darab }}</td>
                                    <td>{{ $rendelestetels[$i]->unev }}</td>
                                </tr>
                            @endfor
                        </table>
                    @endif
                    <a href="/rendeleslista" class="button">Vissza</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
