<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rendelések') }}
        </h2>
        @if ($jelenjog[0]->jognev == 'user')
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href="/kosar" class="button">Kosár</a>
            </h2>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>Szűrő:</div>
                    <form action="/etels" method="get">
                        @csrf
                        <div>
                            <label for="nev">Étel neve:</label>
                            <input type="text" name="nev" id="nev" style="color:black"
                                value="{{ $nev }}">

                            <label for="kanev">Kategória neve:</label>
                            <input type="text" name="kanev" id="kanev" style="color:black"
                                value="{{ $kanev }}">

                            <label for="etnev">Étterem neve:</label>
                            <input type="text" name="etnev" id="etnev" style="color:black"
                                value="{{ $etnev }}">


                        </div>

                        <div>
                            <label for="ar1">Ár alsóhatár</label>
                            <input type="number" name="ar1" id="ar1" style="color:black"
                                value="{{ $ar1 }}">

                            <label for="ar2">Ár felsőhatár</label>
                            <input type="number" name="ar2" id="ar2" style="color:black"
                                value="{{ $ar2 }}">
                        </div>

                        <input type="submit" value="Szűr">
                    </form>
                    @if ($jelenjog[0]->jognev == 'user')
                        <table border=1>
                            <tr>
                                <th>Név</th>
                                <th>Ár</th>
                                <th>Kategória</th>
                                <th>Étterem</th>
                            </tr>
                            @foreach ($etels as $etel)
                                <tr>
                                    <td>{{ $etel->enev }}</td>
                                    <td>{{ $etel->ar }}</td>
                                    <td>{{ $etel->kanev }}</td>
                                    <td>{{ $etel->etnev }}</td>
                                    <td><a href="/etels/{{ $etel->id }}">Kosárba</a></td>
                                </tr>
                            @endforeach

                        </table>
                    @else
                        <table border=1>
                            <tr>
                                <th>Név</th>
                                <th>Ár</th>
                                <th>Kategória</th>
                                <th>Étterem</th>
                                <th>Szerkesztés</th>
                            </tr>
                            @foreach ($etels as $etel)
                                <tr>
                                    <td>{{ $etel->enev }}</td>
                                    <td>{{ $etel->ar }}</td>
                                    <td>{{ $etel->kanev }}</td>
                                    <td>{{ $etel->etnev }}</td>
                                    <td><a href="/etels/{{ $etel->id }}/edit">Szerkeszt</a></td>
                                </tr>
                            @endforeach

                        </table>
                    @endif




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
