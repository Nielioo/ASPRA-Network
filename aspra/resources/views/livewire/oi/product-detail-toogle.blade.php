<div>
    <div class="grid-cols-subgrid col-span-3 cursor-pointer mb-1" wire:click="toggle">
        <div class="text-md text-center font-semibold border-solid border-2 border-slate-400">Keterangan Produk</div>
    </div>
    @if ($isOpen)
        <div class="grid-cols-subgrid col-span-3">
            <div class="grid grid-cols-3 gap-1 border-solid border-2 border-slate-400 p-1">
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
    @endif
</div>
