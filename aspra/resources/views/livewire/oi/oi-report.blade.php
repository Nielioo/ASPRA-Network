<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <table style="width:100%; border: 2px solid #2d3748; padding: 1em;">
        <!-- header 1 -->
        <tr>
            <td colspan="2" style="font-size: 1.5em; font-weight: bold; padding: 0.5em;">PT Asia Pramulia</td>
            <td style="font-weight: bold; padding: 0.5em;">OI ID: {{ $oi->id }}</td>
        </tr>
        <!-- header 2 -->
        <tr>
            <td colspan="3"
                style="text-align: center; font-weight: bold; border: 2px solid #2d3748; padding: 0.5em;">
                Laporan Telusur Balik OI
            </td>
        </tr>
        <!-- body -->
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Tanggal Pembuatan</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $oi->date_created }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Nama Customer</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $oi->customer_name }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Total Order</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $oi->total_order }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Lokasi Penempatan</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $oi->placement_location }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Tahap Pengiriman</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $oi->delivery_stage }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Tipe Test</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $oi->test_type }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Permintaan Khusus</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $oi->special_request }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <!-- header 2 -->
        <tr>
            <td colspan="3"
                style="text-align: center; font-weight: bold; border: 2px solid #2d3748; padding: 0.5em;">
                Keterangan Produk
            </td>
        </tr>
        <!-- body -->
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Kode Produk</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->product_code }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Nama Produk</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->name }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Bahan</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->material }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Berat</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->weight }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Volume</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->volume }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Warna</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->color }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Packing</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->packing }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Isi Produk</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->product_content }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <!-- header 2 -->
        <tr>
            <td colspan="3"
                style="text-align: center; font-weight: bold; border: 2px solid #2d3748; padding: 0.5em;">
                Status Produk
            </td>
        </tr>
        <!-- body -->
        @if ($product->last_order_date)
            <tr>
                <td style="font-weight: bold; padding: 0.5em; width: 33%;">Pengajuan OI terakhir</td>
                <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->last_order_date }}</td>
                <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
            </tr>
        @endif
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Stok saat ini</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->remaining_stock }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Outstanding</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->outstanding }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Total reject keseluruhan</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->grand_total_rejected }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Kebutuhan per bulan</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $product->needs_per_month }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <!-- header 2 -->
        <tr>
            <td colspan="3"
                style="text-align: center; font-weight: bold; border: 2px solid #2d3748; padding: 0.5em;">
                Riwayat Verifikasi
            </td>
        </tr>
        <!-- body -->
        @forelse ($oi->verifications as $verification)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td style="font-weight: bold; padding: 0.5em; width: 50%;">Verifier {{ $verification->verifier_order }}
                </td>
                <td colspan="2" style="padding: 0.5em; text-align: left; width: 50%;">{{ strtoupper($verification->status) }} at
                    {{ $verification->updated_at }} by {{ $verification->verifier_name }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center">No verifications has been made.</td>
            </tr>
        @endforelse
    </table>

    @livewireScripts

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>
