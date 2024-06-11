<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div>
        @livewire('user-settings', ['oi' => $oi, 'productionReport' => $productionReport])
    </div>
</x-custom-layout>
