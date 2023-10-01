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
            <x-label for="kode_laporan" value="{{ __('Kode laporan') }}" />
            <x-input wire:model="productionReport.kode_laporan" type="text" name="kode_laporan" :value="old('kode_laporan')" class="w-full"
                required autofocus />
            @error('productionReport.kode_laporan')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="setting_awal" value="{{ __('Setting Awal') }}" />
            <x-input wire:model="productionReport.setting_awal" type="text" name="setting_awal" :value="old('setting_awal')" class="w-full"
                required autofocus />
            @error('productionReport.setting_awal')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="tanggal" value="{{ __('Tanggal Pembuatan') }}" />
            <x-input wire:model="productionReport.tanggal" type="date" name="tanggal" :value="old('tanggal')" class="w-full"
                required autofocus />
            @error('productionReport.tanggal')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="shift" value="{{ __('Shift') }}" />
            <x-input wire:model="productionReport.shift" type="text" name="shift" :value="old('shift')" class="w-full"
                required autofocus />
            @error('productionReport.shift')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="approved" value="{{ __('Jumlah Approved') }}" />
            <x-input wire:model="productionReport.approved" type="text" name="approved" :value="old('approved')" class="w-full"
                required autofocus />
            @error('productionReport.approved')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="rejected" value="{{ __('Jumlah Rejected') }}" />
            <x-input wire:model="productionReport.rejected" type="text" name="rejected" :value="old('rejected')" class="w-full"
                required autofocus />
            @error('productionReport.rejected')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 pt-8 pb-4">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md w-full">
                {{ __('Save') }}
            </button>
        </div>
    </div>
</form>
