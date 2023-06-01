<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rendelések') }}

            @if ($jelenjog[0]->jognev == 'user')
                @if (count($total)==0)
                    0
                @else
                    Összeg: {{ $total[0]->tot }}
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
                                <th>Törlés</th>
                            </tr>
                            @for ($i = 0; $i < count($rendelestetels); $i++)
                                <tr>
                                    <td>{{ $rendelestetels[$i]->enev }}</td>
                                    <td>{{ $rendelestetels[$i]->darab }}</td>
                                    <td>{{ $rendelestetels[$i]->etnev }}</td>
                                    <td>
                                        <form action="/rendelestetellista/{{ $rendelestetels[$i]->rendelesID }}" method="post">
                                            @csrf
                                            @method('delete')
                                            @if ($rendelestetels[$i]->enev != '')
                                                <input type="submit" value="Törlés">
                                            @endif

                                        </form>
                                    </td>
                                </tr>
                            @endfor
                        </table>
                        <div>
                            <form action="/rendeleses" method="post">
                                @csrf
                                <label for="fizetesmodID">Fizetésmód:</label>
                                <select name="fizetesmodID" id="fizetesmodID" style="color:black">
                                    <option value=1>Készpénz</option>
                                    <option value=2>Kártya</option>

                                    <input type="submit" value="Rendelés leadása">
                            </form>
                        </div>
                    @else
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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
