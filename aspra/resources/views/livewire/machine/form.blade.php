{{-- Form Machine --}}
@if ($errors->any())
    <div class="px-4 py-2">
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <div>
                <span class="font-medium">Whoops!</span> There were some problems with your input.
                <ul class="pt-2 max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<form wire:submit.prevent="save" method="POST">
    @csrf
    <div class="row">
        <div class="px-4 py-2">
            <x-label for="number" value="{{ __('Nomor Mesin') }}" />
            <x-input wire:model="machine.number" type="text" name="number" :value="old('number')"
                class="w-full" required autofocus />
            @error('machine.number')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="name" value="{{ __('Nama Mesin') }}" />
            <x-input wire:model="machine.name" type="text" name="name" :value="old('name')" class="w-full"
                required />
            @error('machine.name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="px-4 pt-8 pb-4">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md w-full">
                {{ __($submitButtonName) }}
            </button>
        </div>
    </div>
</form>
