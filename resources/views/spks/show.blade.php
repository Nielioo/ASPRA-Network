<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm md:text-xl text-gray-800 leading-tight">
            {{ __('SPKs') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4">
                <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                    href="{{ route('spks.index') }}">Back</a>
            </div>
            <div class="bg-white overflow-hidden p-10 shadow-xl sm:rounded-lg">
                {{-- Header 1 --}}
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between pb-10">
                        <h1 class="text-4xl dark:text-white">Detail SPK</h1>
                    </div>
                </div>

                {{-- Body --}}
                <div class="grid-cols-subgrid col-span-3">
                    <div class="grid grid-cols-3 gap-1 border-solid border-2 border-slate-700 p-1">

                        <div class="text-md p-2 font-bold">SPK_ID</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $spk->id }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">File Path</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2"><a href="{{ asset($spk->file_path) }}" class="text-blue-500 underline">{{ $spk->file_path }}</a></div>
                        </div>
                        <div class="text-md p-2 font-bold">Schedule_ID</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $spk->schedule->id }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Nama produk yang ingin di produksi</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $spk->schedule->product_name }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Jumlah produk yang ingin di produksi</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $spk->schedule->product_quantity }}</div>
                        </div>

                    </div>
                </div>

                {{-- Header 1 --}}
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between py-10">
                        <h1 class="text-4xl dark:text-white">SPK File Preview</h1>
                    </div>
                </div>

                {{-- Body --}}
                <iframe title="SPK File" src="{{ asset($spk->file_path) }}" width="100%" height="600px">
                    This browser does not support PDFs. Please download the PDF to view it:
                    <a href="{{ asset($spk->file_path) }}">Download PDF</a>
                </iframe>

                {{-- header 1 --}}
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between py-10">
                        <h1 class="text-4xl dark:text-white">Detail Schedule Yang Bersangkutan</h1>
                    </div>
                </div>

                {{-- body --}}
                @livewire('schedule.schedule-detail-component', ['schedule' => $spk->schedule])

                {{-- header 1 --}}
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between py-10">
                        <h1 class="text-4xl dark:text-white">Detail OI Yang Bersangkutan</h1>
                    </div>
                </div>

                @livewire('oi.oi-detail-component', ['oi' => $spk->schedule->oi])

            </div>
        </div>
    </div>
</x-custom-layout>
