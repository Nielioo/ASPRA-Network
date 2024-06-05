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

        {{-- product search bar --}}
        <div class="px-4 py-2">
            <x-label for="product" value="{{ __('Pilih produk') }}" />
            @if ($selectedProduct)
                <p class="p-2 border border-gray-300 rounded-none rounded-t-lg w-full">
                    [{{ $selectedProduct->id }}][{{ $selectedProduct->product_code }}] - {{ $selectedProduct->name }}
                </p>
            @else
                <p class="text-slate-400 p-2 border border-gray-300 rounded-none rounded-t-lg w-full">No product
                    selected. Please select product first.</p>
            @endif
            <x-input type="text"
                class="border border-gray-300 rounded-none rounded-b-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="search products here..." wire:model="productQuery" wire:keydown.escape="resetVars"
                wire:click.outside="resetVars" />
            <div class="overflow-y-scroll bg-white w-full">
                @if (!empty($productQuery))
                    <div class="fixed top-0 right-0 bottom-0 left-0 -z-10" wire:click="resetVars"></div>
                    @if (!empty($products))
                        @foreach ($products as $product)
                            <ul class="list-outside list-none">
                                <li class="p-2 border-x-2 border-b-2 border-slate-200 cursor-pointer divide-y hover:bg-slate-100"
                                    wire:click="updateSelectedProduct({{ $product['id'] }})">
                                    [{{ $product['id'] }}][{{ $product['product_code'] }}] - {{ $product['name']}}
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
            <x-label for="product" value="{{ __('Pilih Produk') }}" />
            // Input Dropdown
            <select wire:model="product"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" class="text-slate-400" selected>Select an option</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $this->oi->product_id ? 'selected' : '' }}>
                        [{{ $product->product_code }}] - {{ $product->name}} </option>
                @endforeach
            </select>
            @error('product')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div> --}}
        <div class="px-4 py-2">
            <x-label for="date_created" value="{{ __('Tanggal Pembuatan OI') }}" />
            <x-input wire:model="oi.date_created" type="date" name="date_created" :value="old('date_created')" class="w-full"
                disabled required />
            @error('oi.date_created')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="customer_name" value="{{ __('Nama Customer') }}" />
            <x-input wire:model="oi.customer_name" type="text" name="customer_name" :value="old('customer_name')" class="w-full"
                required />
            @error('oi.customer_name')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="total_order" value="{{ __('Total Order') }}" />
            <x-input wire:model="oi.total_order" type="number" name="total_order" :value="old('total_order')" class="w-full"
                required />
            @error('oi.total_order')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="placement_location" value="{{ __('Lokasi Penempatan') }}" />
            <x-input wire:model="oi.placement_location" type="text" name="placement_location" :value="old('placement_location')"
                class="w-full" required />
            @error('oi.placement_location')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="delivery_stage" value="{{ __('Tahap Pengiriman') }}" />
            <x-input wire:model="oi.delivery_stage" type="date" name="delivery_stage" :value="old('delivery_stage')"
                class="w-full" required />
            @error('oi.delivery_stage')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="test_type" value="{{ __('Jenis Test') }}" />
            <x-input wire:model="oi.test_type" type="text" name="test_type" :value="old('test_type')" class="w-full"
                required />
            @error('oi.test_type')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="special_request" value="{{ __('Permintaan Khusus') }}" />
            <x-input wire:model="oi.special_request" type="text" name="special_request" :value="old('special_request')"
                class="w-full" />
            @error('oi.special_request')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 pt-4">
            <div class="flex items-center">
                <input wire:model="oi.is_print" id="is_print" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <x-label for="is_print" class="ms-2 italic font-bold" value="{{ __('*centang jika perlu di print') }}" />
            </div>
        </div>
        <div class="px-4 pt-8 pb-4">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md w-full">
                {{ __($submitButtonName) }}
            </button>
        </div>
    </div>
</form>
