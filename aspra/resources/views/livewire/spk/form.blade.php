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

<form wire:submit.prevent="save" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="px-4 py-2">
            <x-label for="oi" value="{{ __('Pilih OI') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="oi" class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" class="text-slate-400" selected>Select an option</option>
                @foreach ($ois as $oi)
                    <option value="{{ $oi->id }}" {{ $oi->id == $this->spk->oi_id ? 'selected' : '' }}>{{ $oi->id }}</option>
                @endforeach
            </select>
            @error('oi')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="file_path" value="{{ __('File Path') }}" />
            <x-input wire:model="spkFile" type="file" name="file_path" :value="old('file_path')" class="w-full"
                required autofocus />
            @error('spkFile')
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
