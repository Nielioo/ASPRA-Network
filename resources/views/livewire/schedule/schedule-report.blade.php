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
            <td style="font-weight: bold; padding: 0.5em;">OI ID: {{ $schedule->oi->oi_code }}</td>
        </tr>
        <!-- header 2 -->
        <tr>
            <td colspan="3"
                style="text-align: center; font-weight: bold; border: 2px solid #2d3748; padding: 0.5em;">
                Detail OI
            </td>
        </tr>
        <!-- body -->
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Tanggal Pembuatan</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->oi->date_created }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Nama Customer</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->oi->customer_name }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Total Order</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->oi->total_order }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Lokasi Penempatan</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->oi->placement_location }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Tahap Pengiriman</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->oi->delivery_stage }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Tipe Test</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->oi->test_type }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Permintaan Khusus</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->oi->special_request }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <!-- header 2 -->
        <tr>
            <td colspan="3"
                style="text-align: center; font-weight: bold; border: 2px solid #2d3748; padding: 0.5em;">
                Keterangan Produksi
            </td>
        </tr>
        <!-- body -->
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Mesin yang digunakan</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">[{{ $schedule->machine->number }}] - {{ $schedule->machine->name }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Nama Produk yang ingin di produksi</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">[{{ $schedule->oi->product->product_code }}] - {{ $schedule->product_name }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Jumlah Produk yang ingin di produksi</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->product_quantity }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Output STD / Shift</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->output_std_per_shift }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Jadwal mulai produksi</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->date_start }} ({{ $schedule->shift_start }})</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Jadwal selesai produksi</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->date_end }} ({{ $schedule->shift_end }})</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Stok saat ini</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->oi->product->remaining_stock }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Outstanding</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->oi->product->outstanding }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 0.5em; width: 33%;">Total reject keseluruhan</td>
            <td style="padding: 0.5em; text-align: left; width: 33%;">{{ $schedule->oi->product->grand_total_rejected }}</td>
            <td style="padding: 0.5em; width: 33%;"> &nbsp; </td>
        </tr>
    </table>

    @livewireScripts

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>
