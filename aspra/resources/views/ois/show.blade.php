<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('OIs') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4">
                <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                    href="{{ route('ois.index') }}">Back</a>
            </div>
            <div class="bg-white overflow-hidden p-10 shadow-xl sm:rounded-lg">
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between pb-10">
                        <h1 class="text-4xl dark:text-white">Detail OI</h1>
                    </div>
                </div>

                <table class="table-auto">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>ID</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $oi->id }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Tanggal Pembuatan</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $oi->date_created }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Nama Customer</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $oi->customer_name }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Total Order</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $oi->total_order }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Lokasi Penempatan</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $oi->placement_location }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Tahap Pengiriman</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $oi->delivery_stage }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Permintaan Khusus</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $oi->special_request }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Verifikasi 01</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $oi->verification_one }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Verifikasi 02</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $oi->verification_two }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Verifikasi 03</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $oi->verification_three }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Verifikasi 04</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $oi->verification_four }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </x-app-layout>
