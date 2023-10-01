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
            <x-label for="kode_poi" value="{{ __('Kode POI') }}" />
            <x-input wire:model="poi.kode_poi" type="text" name="kode_poi" :value="old('kode_poi')" class="w-full"
                required autofocus />
            @error('poi.kode_poi')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="tanggal_pembuatan_poi" value="{{ __('Tanggal Pembuatan POI') }}" />
            <x-input wire:model="poi.tanggal_pembuatan_poi" type="date" name="tanggal_pembuatan_poi" :value="old('tanggal_pembuatan_poi')" class="w-full"
                required />
            @error('poi.tanggal_pembuatan_poi')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="nama_customer" value="{{ __('Nama Customer') }}" />
            <x-input wire:model="poi.nama_customer" type="text" name="nama_customer" :value="old('nama_customer')" class="w-full"
                required />
            @error('poi.nama_customer')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="total_order" value="{{ __('Total Order') }}" />
            <x-input wire:model="poi.total_order" type="text" name="total_order" :value="old('total_order')" class="w-full"
                required />
            @error('poi.total_order')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="lokasi_penempatan" value="{{ __('Lokasi Penempatan') }}" />
            <x-input wire:model="poi.lokasi_penempatan" type="text" name="lokasi_penempatan" :value="old('lokasi_penempatan')" class="w-full"
                required />
            @error('poi.lokasi_penempatan')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="tahap_pengiriman" value="{{ __('Tahap Pengiriman') }}" />
            <x-input wire:model="poi.tahap_pengiriman" type="text" name="tahap_pengiriman" :value="old('tahap_pengiriman')" class="w-full"
                required />
            @error('poi.tahap_pengiriman')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="stok_akhir" value="{{ __('Stok Akhir') }}" />
            <x-input wire:model="poi.stok_akhir" type="text" name="stok_akhir" :value="old('stok_akhir')" class="w-full"
                required />
            @error('poi.stok_akhir')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="permintaan_khusus" value="{{ __('Permintaan Khusus') }}" />
            <x-input wire:model="poi.permintaan_khusus" type="text" name="permintaan_khusus" :value="old('permintaan_khusus')" class="w-full"
                required />
            @error('poi.permintaan_khusus')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="verifikasi_satu" value="{{ __('Verifikasi Satu') }}" />
            <x-input wire:model="poi.verifikasi_satu" type="text" name="verifikasi_satu" :value="old('verifikasi_satu')" class="w-full"
                required />
            @error('poi.verifikasi_satu')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="verifikasi_dua" value="{{ __('Verifikasi dua') }}" />
            <x-input wire:model="poi.verifikasi_dua" type="text" name="verifikasi_dua" :value="old('verifikasi_dua')" class="w-full"
                required />
            @error('poi.verifikasi_dua')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="verifikasi_tiga" value="{{ __('Verifikasi tiga') }}" />
            <x-input wire:model="poi.verifikasi_tiga" type="text" name="verifikasi_tiga" :value="old('verifikasi_tiga')" class="w-full"
                required />
            @error('poi.verifikasi_tiga')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="verifikasi_empat" value="{{ __('Verifikasi empat') }}" />
            <x-input wire:model="poi.verifikasi_empat" type="text" name="verifikasi_empat" :value="old('verifikasi_empat')" class="w-full"
                required />
            @error('poi.verifikasi_empat')
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
