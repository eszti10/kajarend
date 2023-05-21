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

                    @if ($jelenjog[0]->jognev == 'admin')
                        <form action="/etels/{{ $etel->id }}" method="post">
                            @csrf
                            @method('put')
                            <label for="nev">Étel neve:</label>
                            <input type="text" name="nev" id="nev" value="{{ $etel->nev }}"
                                style="color:black">

                            <label for="ar">Ár:</label>
                            <input type="text" name="ar" id="ar" value="{{ $etel->ar }}"
                                style="color:black">

                            <label for="kategoriaID">Válassz kategóriát</label>
                            <select name="kategoriaID" id="kategoriaID" style="color:black">
                                <option value={{ $etel->kategoriaID }}>{{ $kanev[0]->nev }}</option>
                                <option value=1>Gyors kaja</option>
                                <option value=2>Elő étel</option>
                                <option value=3>Köret</option>
                                <option value=4>Főétel</option>
                                <option value=5>Leves</option>
                                <option value=6>Ital</option>
                                <option value=7>Desszert</option>
                            </select>

                            <label for="etteremID">Étterem neve:</label>
                            <select name="etteremID" id="etteremID" style="color:black">
                                <option value={{ $etel->etteremID }}>{{ $etnev[0]->nev }}</option>
                                @for ($i = 0; $i < count($etterems); $i++)
                                    {
                                    <option value={{ $i+1 }}>{{ $etterems[$i]->nev }}</option>
                                    }
                                @endfor
                                <input type="submit" value="Mentés">
                        </form>

                        <form action="/etels/{{ $etel->id }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Törlés">
                        </form>
                    @elseif ($jelenjog[0]->jognev == 'tulaj')
                        <form action="/etels/{{ $etel->id }}" method="post">
                            @csrf
                            @method('put')
                            <label for="nev">Étel neve:</label>
                            <input type="text" name="nev" id="nev" value="{{ $etel->nev }}"
                                style="color:black">

                            <label for="ar">Ár:</label>
                            <input type="text" name="ar" id="ar" value="{{ $etel->ar }}"
                                style="color:black">

                            <label for="kategoriaID">Válassz kategóriát</label>
                            <select name="kategoriaID" id="kategoriaID" style="color:black">
                                <option value={{ $etel->kategoriaID }}>{{ $kanev[0]->nev }}</option>
                                <option value=1>Gyors kaja</option>
                                <option value=2>Elő étel</option>
                                <option value=3>Köret</option>
                                <option value=4>Főétel</option>
                                <option value=5>Leves</option>
                                <option value=6>Ital</option>
                                <option value=7>Desszert</option>
                            </select>

                            <label for="etteremID">Étterem neve:</label>
                            <select name="etteremID" id="etteremID" style="color:black">
                                <option value={{ $etel->etteremID }}>{{ $etnev[0]->nev }}</option>
                            </select>
                                <input type="submit" value="Mentés">
                        </form>

                        <form action="/etels/{{ $etel->id }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Törlés">
                        </form>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
