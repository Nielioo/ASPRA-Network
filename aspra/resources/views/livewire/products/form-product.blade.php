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
            <x-label for="kode_produk" value="{{ __('Kode Produk') }}" />
            <x-input wire:model="product.kode_produk" type="text" name="kode_produk" :value="old('kode_produk')" class="w-full"
                required autofocus />
            @error('product.kode_produk')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="nama_produk" value="{{ __('Nama Produk') }}" />
            <x-input wire:model="product.nama_produk" type="text" name="nama_produk" :value="old('nama_produk')" class="w-full"
                required />
            @error('product.nama_produk')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="bahan" value="{{ __('Bahan') }}" />
            <x-input wire:model="product.bahan" type="text" name="bahan" :value="old('bahan')" class="w-full"
                required />
            @error('product.bahan')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="berat" value="{{ __('Berat') }}" />
            <x-input wire:model="product.berat" type="text" name="berat" :value="old('berat')" class="w-full"
                required />
            @error('product.berat')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="volume" value="{{ __('Volume') }}" />
            <x-input wire:model="product.volume" type="text" name="volume" :value="old('volume')" class="w-full"
                required />
            @error('product.volume')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="warna" value="{{ __('Warna') }}" />
            <x-input wire:model="product.warna" type="text" name="warna" :value="old('warna')" class="w-full"
                required />
            @error('product.warna')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="packing" value="{{ __('Packing') }}" />
            <x-input wire:model="product.packing" type="text" name="packing" :value="old('packing')" class="w-full"
                required />
            @error('product.packing')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="isi_produk" value="{{ __('Isi Produk') }}" />
            <x-input wire:model="product.isi_produk" type="text" name="isi_produk" :value="old('isi_produk')" class="w-full"
                required />
            @error('product.isi_produk')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="jenis_test" value="{{ __('Jenis Test') }}" />
            <x-input wire:model="product.jenis_test" type="text" name="jenis_test" :value="old('jenis_test')" class="w-full"
                required />
            @error('product.jenis_test')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="outstanding" value="{{ __('Outstanding') }}" />
            <x-input wire:model="product.outstanding" type="text" name="outstanding" :value="old('outstanding')" class="w-full"
                required />
            @error('product.outstanding')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="kebutuhan_per_bulan" value="{{ __('Kebutuhan per Bulan') }}" />
            <x-input wire:model="product.kebutuhan_per_bulan" type="text" name="kebutuhan_per_bulan"
                :value="old('kebutuhan_per_bulan')" class="w-full" required />
            @error('product.kebutuhan_per_bulan')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="pengajuan_terakhir" value="{{ __('Pengajuan Terakhir') }}" />
            <x-input wire:model="product.pengajuan_terakhir" type="date" name="pengajuan_terakhir" :value="old('pengajuan_terakhir')"
                class="w-full" required />
            @error('product.pengajuan_terakhir')
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
