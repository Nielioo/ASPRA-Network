<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm md:text-xl text-gray-800 leading-tight">
            {{ __('OIs') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-xl sm:rounded-lg">

                @livewire('oi.oi-table', ['ois' => $ois])

            </div>
        </div>
    </div>
</x-custom-layout>
