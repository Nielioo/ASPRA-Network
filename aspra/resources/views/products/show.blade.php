<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4">
                <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                    href="{{ route('products.index') }}">Back</a>
            </div>
            <div class="bg-white overflow-hidden p-10 shadow-xl sm:rounded-lg">
                {{-- Header 1 --}}
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between pb-10">
                        <h1 class="text-4xl dark:text-white">Detail Product</h1>
                    </div>
                </div>

                {{-- Body --}}
                <div class="grid-cols-subgrid col-span-3">
                    <div class="grid grid-cols-3 gap-1 border-solid border-2 border-slate-700 p-1">

                        <div class="text-md p-2 font-bold">Kode Produk</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $product->product_code }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Nama Produk</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $product->name }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Bahan</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $product->material }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Berat</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $product->weight }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Volume</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $product->volume }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Warna</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $product->color }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Packing</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $product->packing }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Isi Produk</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $product->product_content }}</div>
                        </div>

                    </div>
                </div>

                {{-- Header 1 --}}
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between py-10">
                        <h1 class="text-4xl dark:text-white">Status Product</h1>
                    </div>
                </div>

                {{-- Body --}}
                <div class="grid-cols-subgrid col-span-3">
                    <div class="grid grid-cols-3 gap-1 border-solid border-2 border-slate-700 p-1">

                        <div class="text-md p-2 font-bold">Pengajuan OI terakhir</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $product->last_order_date }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Stok Akhir</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $product->remaining_stock }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Outstanding</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $product->outstanding }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Kebutuhan per bulan</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $product->needs_per_month }}</div>
                        </div>

                    </div>
                </div>

                {{-- <table class="table-auto">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800">
                                <strong>Stok Akhir</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->remaining_stock }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800">
                                <strong>Outstanding</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->outstanding }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800">
                                <strong>Kebutuhan per Bulan</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->needs_per_month }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800">
                                <strong>Pengajuan Terakhir</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->last_order_date }}</td>
                        </tr>
                    </tbody>
                </table> --}}

            </div>
        </div>
    </div>
</x-custom-layout>
