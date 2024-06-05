<div>
    <div class="grid grid-cols-3 gap-1 p-2 border-solid border-2 border-slate-700">
        {{-- header 1 --}}
        <div class="grid-cols-subgrid col-span-2">
            <div class="text-3xl p-2 font-bold">PT Asia Pramulia</div>
        </div>
        <div class="text-md p-2 font-bold flex items-center">Kode OI: {{ $oi->oi_code }}</div>
        {{-- header 2 --}}
        <div class="grid-cols-subgrid col-span-3">
            <div class="text-md text-center font-semibold border-solid border-2 border-slate-400">
                Laporan Telusur Balik OI
            </div>
        </div>
        {{-- body --}}
        <div class="grid-cols-subgrid col-span-3">
            <div class="grid grid-cols-3 gap-1 border-solid border-2 border-slate-400 p-1">

                <div class="text-md p-2 font-bold">Tanggal Pembuatan</div>
                <div class="grid-cols-subgrid col-span-2">
                    <div class="text-md p-2">{{ $oi->date_created }}</div>
                </div>
                <div class="text-md p-2 font-bold">Nama Customer</div>
                <div class="grid-cols-subgrid col-span-2">
                    <div class="text-md p-2">{{ $oi->customer_name }}</div>
                </div>
                <div class="text-md p-2 font-bold">Total Order</div>
                <div class="grid-cols-subgrid col-span-2">
                    <div class="text-md p-2">{{ $oi->total_order }}</div>
                </div>
                <div class="text-md p-2 font-bold">Lokasi Penempatan</div>
                <div class="grid-cols-subgrid col-span-2">
                    <div class="text-md p-2">{{ $oi->placement_location }}</div>
                </div>
                <div class="text-md p-2 font-bold">Tahap Pengiriman</div>
                <div class="grid-cols-subgrid col-span-2">
                    <div class="text-md p-2">{{ $oi->delivery_stage }}</div>
                </div>
                <div class="text-md p-2 font-bold">Tipe Test</div>
                <div class="grid-cols-subgrid col-span-2">
                    <div class="text-md p-2">{{ $oi->test_type }}</div>
                </div>
                <div class="text-md p-2 font-bold">Permintaan Khusus</div>
                <div class="grid-cols-subgrid col-span-2">
                    <div class="text-md p-2">{{ $oi->special_request }}</div>
                </div>

            </div>
        </div>

        <div class="grid-cols-subgrid col-span-3">
            @livewire('oi.product-detail-toogle', ['product' => $oi->product])
        </div>
    </div>
</div>
