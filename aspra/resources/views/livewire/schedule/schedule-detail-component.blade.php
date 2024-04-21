<div>
    <div class="grid-cols-subgrid col-span-3">
        <div class="grid grid-cols-3 gap-1 border-solid border-2 border-slate-700 p-1">

            <div class="text-md p-2 font-bold">Schedule_ID</div>
            <div class="grid-cols-subgrid col-span-2">
                <div class="text-md p-2">{{ $schedule->id }}</div>
            </div>
            <div class="text-md p-2 font-bold">Mesin yang digunakan</div>
            <div class="grid-cols-subgrid col-span-2">
                <div class="text-md p-2">[{{ $schedule->machine->id }}] - {{ $schedule->machine->name }}
                </div>
            </div>
            <div class="text-md p-2 font-bold">Nama Produk yang ingin di produksi</div>
            <div class="grid-cols-subgrid col-span-2">
                <div class="text-md p-2">[{{ $schedule->oi->product->product_code }}] - {{ $schedule->product_name }}
                </div>
            </div>
            <div class="text-md p-2 font-bold">Jumlah Produk yang ingin di produksi</div>
            <div class="grid-cols-subgrid col-span-2">
                <div class="text-md p-2">{{ $schedule->product_quantity }}</div>
            </div>
            <div class="text-md p-2 font-bold">Jadwal mulai produksi</div>
            <div class="grid-cols-subgrid col-span-2">
                <div class="text-md p-2">{{ $schedule->date_start }} ({{ $schedule->shift_start }})</div>
            </div>
            <div class="text-md p-2 font-bold">Jadwal selesai produksi</div>
            <div class="grid-cols-subgrid col-span-2">
                <div class="text-md p-2">{{ $schedule->date_end }} ({{ $schedule->shift_end }})</div>
            </div>

        </div>
    </div>
</div>
