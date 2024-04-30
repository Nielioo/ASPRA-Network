{{-- Form OI --}}

<form wire:submit.prevent="save" method="POST">
    @csrf
    <div class="row">
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

        {{-- oi search bar --}}
        <div class="px-4 py-2">
            <x-label for="oi" value="{{ __('Pilih OI') }}" />
            @if ($selectedOi)
                <p class="p-2 border border-gray-300 rounded-none rounded-t-lg w-full">
                    [{{ $selectedOi->id }}] - {{ $selectedOi->product->name }} (Customer Name: {{ $selectedOi->customer_name }},Total order: {{ $selectedOi->total_order }})
                </p>
            @else
                <p class="text-slate-400 p-2 border border-gray-300 rounded-none rounded-t-lg w-full">No OI
                    selected. Please select OI first.</p>
            @endif
            <x-input type="text"
                class="border border-gray-300 rounded-none rounded-b-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="search ois here..." wire:model="oiQuery" wire:keydown.escape="resetVars"
                wire:click.outside="resetVars" />
            <div class="overflow-y-scroll bg-white w-full">
                @if (!empty($oiQuery))
                    <div class="fixed top-0 right-0 bottom-0 left-0 -z-10" wire:click="resetVars"></div>
                    @if (!empty($ois))
                        @foreach ($ois as $oi)
                            <ul class="list-outside list-none">
                                <li class="p-2 border-x-2 border-b-2 border-slate-200 cursor-pointer divide-y hover:bg-slate-100"
                                    wire:click="updateSelectedOi({{ $oi['id'] }})">
                                    [{{ $oi['id'] }}] - {{ $oi['product']['name'] }} (Customer Name: {{ $oi['customer_name'] }},Total order: {{ $oi['total_order'] }})
                                    {{-- [{{ $oi['id'] }}] - (Customer Name: {{ $oi['customer_name'] }},Total order: {{ $oi['total_order'] }}) --}}
                                </li>
                            </ul>
                        @endforeach
                    @else
                        <ul class="list-outside list-none">
                            <li class="p-2 border-x-2 border-b-2 border-slate-200 cursor-pointer divide-y hover:bg-slate-100">
                                No result found
                            </li>
                        </ul>
                    @endif
                @endif
            </div>
        </div>
        {{-- <div class="px-4 py-2">
            <x-label for="oi" value="{{ __('Pilih OI') }}" />
            // Input Dropdown
            <select wire:model="oi"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" class="text-slate-400" selected>Select an option</option>
                @foreach ($ois as $oi)
                    <option value="{{ $oi->id }}" {{ $oi->id == $this->schedule->oi_id ? 'selected' : '' }}>
                        [{{ $oi->id }}] - {{ $oi->product->name }} (Total order: {{ $oi->total_order }})</option>
                @endforeach
            </select>
            @error('oi')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div> --}}

        <div class="px-4 py-2">
            <x-label for="machine" value="{{ __('Pilih Mesin') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="machine"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
                <option value="" class="text-slate-400" selected>Select an option</option>
                @foreach ($machines as $machine)
                    <option value="{{ $machine->id }}"
                        {{ $machine->id == $this->schedule->machine_id ? 'selected' : '' }}>
                        [{{ $machine->id }}] - {{ $machine->name }}
                    </option>
                @endforeach
            </select>
            @error('machine')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="product_name" value="{{ __('Nama produk (sesuai dengan OI)') }}" />
            <x-input wire:model="schedule.product_name" type="text" name="product_name" :value="old('product_name')"
                class="w-full" required />
            @error('schedule.product_name')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="product_quantity" value="{{ __('Jumlah produk yang ingin diproduksi (sesuai dengan oi)') }}" />
            <x-input wire:model="schedule.product_quantity" type="number" name="product_quantity" :value="old('product_quantity')"
                class="w-full" required />
            @error('schedule.product_quantity')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="output_std_per_shift" value="{{ __('Output STD / Shift') }}" />
            <x-input wire:model="schedule.output_std_per_shift" type="number" name="output_std_per_shift" :value="old('output_std_per_shift')"
                class="w-full" required />
            @error('schedule.output_std_per_shift')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="date_start" value="{{ __('Tanggal mulai produksi') }}" />
            <x-input wire:model="schedule.date_start" type="date" name="date_start" :value="old('date_start')" class="w-full"
                required />
            @error('schedule.date_start')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="shift_start" value="{{ __('Pilih shift mulai produksi') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="schedule.shift_start"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
                <option value="" class="text-slate-400" selected>Select an option</option>
                <option value="Shift 1" {{ $this->schedule->shift_start == 'Shift 1' ? 'selected' : '' }}>Shift 1
                </option>
                <option value="Shift 2" {{ $this->schedule->shift_start == 'Shift 2' ? 'selected' : '' }}>Shift 2
                </option>
                <option value="Shift 3" {{ $this->schedule->shift_start == 'Shift 3' ? 'selected' : '' }}>Shift 3
                </option>
            </select>
            @error('schedule.shift_start')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="date_end" value="{{ __('Tanggal selesai produksi') }}" />
            <x-input wire:model="schedule.date_end" type="date" name="date_end" :value="old('date_end')" class="w-full"
                required />
            @error('schedule.date_end')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="shift_end" value="{{ __('Pilih shift selesai produksi') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="schedule.shift_end"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
                <option value="" class="text-slate-400" selected>Select an option</option>
                <option value="Shift 1" {{ $this->schedule->shift_end == 'Shift 1' ? 'selected' : '' }}>Shift 1
                </option>
                <option value="Shift 2" {{ $this->schedule->shift_end == 'Shift 2' ? 'selected' : '' }}>Shift 2
                </option>
                <option value="Shift 3" {{ $this->schedule->shift_end == 'Shift 3' ? 'selected' : '' }}>Shift 3
                </option>
            </select>
            @error('schedule.shift_end')
                <div class="text-red-600">{{ $message }}</div>
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
