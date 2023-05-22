<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="/rendelestetellista/4" class="button">Kosár</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 align="center"><a href="/etels" class="button">Ételek listázása</a></h1>
                    <h1 align="center"><a href="/rendeleslista" class="button">Rendeléseim listázása</a></h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
