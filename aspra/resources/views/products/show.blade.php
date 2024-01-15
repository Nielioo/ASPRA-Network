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
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between pb-10">
                        <h1 class="text-4xl dark:text-white">Detail Product</h1>
                    </div>
                </div>

                <table class="table-auto">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>ID</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Kode Produk</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->product_code }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Nama Produk</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Bahan</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->material }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Berat</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->weight }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Volume</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->volume }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Warna</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->color }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Packing</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->packing }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800">
                                <strong>Isi Produk</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->product_content }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Jenis Test</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $product->test_type }}</td>
                        </tr>
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
                </table>

            </div>
        </div>
    </div>
    </x-app-layout>
