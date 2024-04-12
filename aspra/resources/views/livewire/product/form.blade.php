{{-- Form Product --}}

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
            <x-label for="product_code" value="{{ __('Kode Produk') }}" />
            <x-input wire:model="product.product_code" type="text" name="product_code" :value="old('product_code')"
                class="w-full" required autofocus />
            @error('product.product_code')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="name" value="{{ __('Nama Produk') }}" />
            <x-input wire:model="product.name" type="text" name="name" :value="old('name')" class="w-full"
                required />
            @error('product.name')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="material" value="{{ __('Bahan') }}" />
            <x-input wire:model="product.material" type="text" name="material" :value="old('material')" class="w-full"
                required />
            @error('product.material')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="weight" value="{{ __('Berat') }}" />
            <x-input wire:model="product.weight" type="text" name="weight" :value="old('weight')" class="w-full"
                required />
            @error('product.weight')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="volume" value="{{ __('Volume') }}" />
            <x-input wire:model="product.volume" type="text" name="volume" :value="old('volume')" class="w-full"
                required />
            @error('product.volume')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="color" value="{{ __('Warna') }}" />
            <x-input wire:model="product.color" type="text" name="color" :value="old('color')" class="w-full"
                required />
            @error('product.color')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="packing" value="{{ __('Packing') }}" />
            <x-input wire:model="product.packing" type="text" name="packing" :value="old('packing')" class="w-full"
                required />
            @error('product.packing')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="product_content" value="{{ __('Isi Produk') }}" />
            <x-input wire:model="product.product_content" type="text" name="product_content" :value="old('product_content')"
                class="w-full" required />
            @error('product.product_content')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="remaining_stock" value="{{ __('Stok Akhir') }}" />
            <x-input wire:model="product.remaining_stock" type="number" name="remaining_stock" :value="old('remaining_stock')"
                class="w-full" required />
            @error('product.remaining_stock')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="outstanding" value="{{ __('Outstanding') }}" />
            <x-input wire:model="product.outstanding" type="number" name="outstanding" :value="old('outstanding')"
                class="w-full" required />
            @error('product.outstanding')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="needs_per_month" value="{{ __('Kebutuhan per Bulan') }}" />
            <x-input wire:model="product.needs_per_month" type="number" name="needs_per_month" :value="old('needs_per_month')"
                class="w-full" required />
            @error('product.needs_per_month')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="last_order_date" value="{{ __('Pengajuan Terakhir') }}" />
            <x-input wire:model="product.last_order_date" type="date" name="last_order_date" :value="old('last_order_date')"
                class="w-full" required />
            @error('product.last_order_date')
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
