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
            <x-label for="product" value="{{ __('Pilih Produk') }}" />
            <select wire:model="product" class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $this->oi->product_id ? 'selected' : '' }}>{{ $product->product_code }}</option>
                @endforeach
            </select>
            @error('product')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="date_created" value="{{ __('Tanggal Pembuatan OI') }}" />
            <x-input wire:model="oi.date_created" type="date" name="date_created" :value="old('date_created')" class="w-full"
                disabled required />
            @error('oi.date_created')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="customer_name" value="{{ __('Nama Customer') }}" />
            <x-input wire:model="oi.customer_name" type="text" name="customer_name" :value="old('customer_name')" class="w-full"
                required />
            @error('oi.customer_name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="total_order" value="{{ __('Total Order') }}" />
            <x-input wire:model="oi.total_order" type="number" name="total_order" :value="old('total_order')" class="w-full"
                required />
            @error('oi.total_order')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="placement_location" value="{{ __('Lokasi Penempatan') }}" />
            <x-input wire:model="oi.placement_location" type="text" name="placement_location" :value="old('placement_location')"
                class="w-full" required />
            @error('oi.placement_location')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="delivery_stage" value="{{ __('Tahap Pengiriman') }}" />
            <x-input wire:model="oi.delivery_stage" type="text" name="delivery_stage" :value="old('delivery_stage')"
                class="w-full" required />
            @error('oi.delivery_stage')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="special_request" value="{{ __('Permintaan Khusus') }}" />
            <x-input wire:model="oi.special_request" type="text" name="special_request" :value="old('special_request')"
                class="w-full" />
            @error('oi.special_request')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="verification_one" value="{{ __('Verifikasi 01') }}" />
            <x-input wire:model="oi.verification_one" type="text" name="verification_one" :value="old('verification_one')"
                class="w-full" />
            @error('oi.verification_one')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="verification_two" value="{{ __('Verifikasi 02') }}" />
            <x-input wire:model="oi.verification_two" type="text" name="verification_two" :value="old('verification_two')"
                class="w-full" />
            @error('oi.verification_two')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="verification_three" value="{{ __('Verifikasi 03') }}" />
            <x-input wire:model="oi.verification_three" type="text" name="verification_three" :value="old('verification_three')"
                class="w-full" />
            @error('oi.verification_three')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="verification_four" value="{{ __('Verifikasi 04') }}" />
            <x-input wire:model="oi.verification_four" type="text" name="verification_four" :value="old('verification_four')"
                class="w-full" />
            @error('oi.verification_four')
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
