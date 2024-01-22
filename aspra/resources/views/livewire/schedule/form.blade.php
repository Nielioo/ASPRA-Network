{{-- Form OI --}}
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
            <x-label for="oi" value="{{ __('Pilih OI') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="oi" class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" class="text-slate-400" selected>Select an option</option>
                @foreach ($ois as $oi)
                    <option value="{{ $oi->id }}" {{ $oi->id == $this->schedule->oi_id ? 'selected' : '' }}>{{ $oi->id }}</option>
                @endforeach
            </select>
            @error('oi')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="machine" value="{{ __('Pilih Mesin') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="machine"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="" class="text-slate-400" selected>Select an option</option>
                @foreach ($machines as $machine)
                    <option value="{{ $machine->id }}" {{ $machine->id == $this->schedule->machine_id ? 'selected' : '' }}>{{ $machine->name }}</option>
                @endforeach
            </select>
            @error('machine')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="production" value="{{ __('Nama Produksi') }}" />
            <x-input wire:model="schedule.production" type="text" name="production" :value="old('production')" class="w-full"
                required />
            @error('schedule.production')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="date_start" value="{{ __('Tanggal mulai produksi') }}" />
            <x-input wire:model="schedule.date_start" type="date" name="date_start" :value="old('date_start')" class="w-full"
                required />
            @error('schedule.date_start')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="shift_start" value="{{ __('Pilih shift mulai produksi') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="schedule.shift_start"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="" class="text-slate-400" selected>Select an option</option>
                <option value="Shift 1" {{ $this->schedule->shift_start == 'Shift 1' ? 'selected' : '' }}>Shift 1
                </option>
                <option value="Shift 2" {{ $this->schedule->shift_start == 'Shift 2' ? 'selected' : '' }}>Shift 2
                </option>
                <option value="Shift 3" {{ $this->schedule->shift_start == 'Shift 3' ? 'selected' : '' }}>Shift 3
                </option>
            </select>
            @error('schedule.shift_start')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="date_end" value="{{ __('Tanggal selesai produksi') }}" />
            <x-input wire:model="schedule.date_end" type="date" name="date_end" :value="old('date_end')" class="w-full"
                required />
            @error('schedule.date_end')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="shift_end" value="{{ __('Pilih shift selesai produksi') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="schedule.shift_end"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="" class="text-slate-400" selected>Select an option</option>
                <option value="Shift 1" {{ $this->schedule->shift_end == 'Shift 1' ? 'selected' : '' }}>Shift 1
                </option>
                <option value="Shift 2" {{ $this->schedule->shift_end == 'Shift 2' ? 'selected' : '' }}>Shift 2
                </option>
                <option value="Shift 3" {{ $this->schedule->shift_end == 'Shift 3' ? 'selected' : '' }}>Shift 3
                </option>
            </select>
            @error('schedule.shift_end')
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
