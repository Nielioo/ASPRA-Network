<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <form method="post" action="{{ url('/send-message') }}">
            @csrf
            <input type="submit" name="send" value="Send WhatsApp Message">
        </form>
    </div>
</x-custom-layout>
