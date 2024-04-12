{{-- Form Production Report --}}
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

        <div class="px-4 py-2">
            <x-label for="schedule" value="{{ __('Pilih Jadwal') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="schedule"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" class="text-slate-400" selected>Select an option</option>
                @foreach ($schedules as $schedule)
                    <option value="{{ $schedule->id }}"
                        {{ $schedule->id == $this->productionReport->schedule_id ? 'selected' : '' }}>
                        {{ $schedule->id }} - {{ $schedule->product_name }}</option>
                @endforeach
            </select>
            @error('schedule')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="type" value="{{ __('Pilih tipe produksi') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="productionReport.type"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
                <option value="" class="text-slate-400" selected>Select an option</option>
                <option value="INJECT" {{ $this->productionReport->type == 'INJECT' ? 'selected' : '' }}>INJECT</option>
                <option value="BLOW" {{ $this->productionReport->type == 'BLOW' ? 'selected' : '' }}>BLOW</option>
            </select>
            @error('productionReport.type')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="product_quantity" value="{{ __('Jumlah total produk yang diproduksi') }}" />
            <x-input wire:model="productionReport.product_quantity" type="text" name="product_quantity"
                :value="old('product_quantity')" class="w-full" required autofocus />
            @error('productionReport.product_quantity')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="date" value="{{ __('Tanggal pembuatan laporan produksi') }}" />
            <x-input wire:model="productionReport.date" type="date" name="date" :value="old('date')" class="w-full"
                required />
            @error('productionReport.date')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="shift" value="{{ __('Pilih Shift') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="productionReport.shift"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" class="text-slate-400" selected>Select an option</option>
                <option value="Shift 1" {{ $this->productionReport->shift == 'Shift 1' ? 'selected' : '' }}>Shift 1
                </option>
                <option value="Shift 2" {{ $this->productionReport->shift == 'Shift 2' ? 'selected' : '' }}>Shift 2
                </option>
                <option value="Shift 3" {{ $this->productionReport->shift == 'Shift 3' ? 'selected' : '' }}>Shift 3
                </option>
            </select>
            @error('productionReport.shift')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="total_approved" value="{{ __('Total produk (approved)') }}" />
            <x-input wire:model="productionReport.total_approved" type="text" name="total_approved" :value="old('total_approved')"
                class="w-full" required />
            @error('productionReport.total_approved')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="total_rejected" value="{{ __('Total produk (total_rejected)') }}" />
            <x-input wire:model="productionReport.total_rejected" type="text" name="total_rejected" :value="old('total_rejected')"
                class="w-full" required />
            @error('productionReport.total_rejected')
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
