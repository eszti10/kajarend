<link rel="stylesheet" type="text/css" href="{{ url('/css/kajarend.css') }}" />
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
                    @if ($jelenjog[0]->jognev == 'user'||$jelenjog[0]->jognev == 'admin')
                        <table border=5 style="">
                            <tr>
                                <th>Megtekint</th>
                                <th>Dátum</th>
                                <th>Rendelő</th>
                                <th>Státusz</th>
                                <th>Fizetésmód</th>
                                <th>Összeg</th>
                                <th>Futár</th>
                                <th>Megjegyzés</th>
                            </tr>
                            @for ($i = 0; $i < count($rendeleses); $i++)
                                <tr>
                                    <td><a href="/rendelestetellista/{{ $rendeleses[$i]->rid }}">Megtekint</a></td>
                                    <td>{{ $rendeleses[$i]->datum }}</td>
                                    <td>{{ $rendeleses[$i]->name }}</td>
                                    <td>{{ $rendeleses[$i]->statusznev }}</td>
                                    <td>{{ $rendeleses[$i]->ftip }}</td>
                                    <td>{{ $rendeleses[$i]->total }} Ft</td>
                                    <td>{{ $futars[$i]->name }}</td>
                                    <td>{{ $rendeleses[$i]->megjegyzés }}</td>
                                </tr>
                            @endfor
                        </table>
                    @endif
                    @if ($jelenjog[0]->jognev == 'tulaj')
                        <table border=5 style="">
                            <tr>
                                <th>Megtekint</th>
                                <th>Dátum</th>
                                <th>Rendelő</th>
                                <th>Státusz</th>
                                <th>Fizetésmód</th>
                                <th>Összeg</th>
                                <th>Futár</th>
                                <th>Megjegyzés</th>
                            </tr>
                            @for ($i = 0; $i < count($rendeleses); $i++)
                                <tr>
                                    <td><a href="/rendelestetellista/{{ $rendeleses[$i]->rid }}">Megtekint</a></td>
                                    <td>{{ $rendeleses[$i]->datum }}</td>
                                    <td>{{ $rendeleses[$i]->name }}</td>
                                    <td>{{ $rendeleses[$i]->statusznev }}</td>
                                    <td>{{ $rendeleses[$i]->ftip }}</td>
                                    <td>{{ $rendeleses[$i]->total }} Ft</td>
                                    <td>{{ $futars[$i]->name }}</td>
                                    <td>{{ $rendeleses[$i]->megjegyzés }}</td>
                                </tr>
                            @endfor
                        </table>
                    @endif
                    @if ($jelenjog[0]->jognev == 'futar')
                        <table border=5 style="">
                            <tr>
                                <th>Megtekint</th>
                                <th>Dátum</th>
                                <th>Rendelő</th>
                                <th>Státusz</th>
                                <th>Fizetésmód</th>
                                <th>Összeg</th>
                                <th>Megjegyzés</th>
                            </tr>
                            @for ($i = 0; $i < count($rendeleses); $i++)
                                <tr>
                                    <td><a href="/rendelestetellista/{{ $rendeleses[$i]->rid }}">Megtekint</a></td>
                                    <td>{{ $rendeleses[$i]->datum }}</td>
                                    <td>{{ $rendeleses[$i]->name }}</td>
                                    <td>{{ $rendeleses[$i]->statusznev }}</td>
                                    <td>{{ $rendeleses[$i]->ftip }}</td>
                                    <td>{{ $rendeleses[$i]->total }} Ft</td>
                                    <td>{{ $rendeleses[$i]->megjegyzés }}</td>
                                </tr>
                            @endfor
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
