<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kosárba helyezés') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/rendelestetellista" method="post">
                        @csrf
                        <table border=1>
                            <tr>
                                <th>Név</th>
                                <th>Ár</th>
                                <th>Kategória</th>
                                <th>Étterem</th>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="enev" value="{{ $etels[0]->enev }}">{{ $etels[0]->enev }}</td>
                                <td name="ar" id="ar">{{ $etels[0]->ar }}</td>
                                <td name="kanev" id="kanev">{{ $etels[0]->kanev }}</td>
                                <td name="etnev" id="etnev">{{ $etels[0]->etnev }}</td>

                            </tr>
                        </table>


                        <label for="db">Darabszám</label>
                        <input type="number" name="db" id="db" style="color:black"
                            value="{{ $db }}">

                        <input type="submit" value="Kosárba">
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
