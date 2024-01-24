{{-- Verification OI --}}

<div>
    <table class="table-auto">
        <tbody>
            <tr>
                <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>ID</strong></td>
                <td class="border px-4 py-2 text-center">{{ $oi->id }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Tanggal Pembuatan</strong>
                </td>
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
                <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Lokasi Penempatan</strong>
                </td>
                <td class="border px-4 py-2 text-center">{{ $oi->placement_location }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Tahap Pengiriman</strong>
                </td>
                <td class="border px-4 py-2 text-center">{{ $oi->delivery_stage }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Permintaan Khusus</strong>
                </td>
                <td class="border px-4 py-2 text-center">{{ $oi->special_request }}</td>
            </tr>
        </tbody>
    </table>

    <br>

    <button wire:click="verify" class="bg-lime-500 hover:bg-lime-700 text-lime-950 hover:text-white font-semibold py-2 px-4 border border-lime-500 hover:border-transparent rounded">
        Verify
    </button>
    <button wire:click="deny" class="bg-red-500 hover:bg-red-700 text-white hover:text-white font-semibold py-2 px-4 border border-red-500 hover:border-transparent rounded">
        Deny
    </button>
</div>
