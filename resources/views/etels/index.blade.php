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

                    @if ($etels=="")
                        {{$etels}}
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
