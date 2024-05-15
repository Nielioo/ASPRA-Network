<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm md:text-xl text-gray-800 leading-tight">
            {{ __('Machines') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4">
                <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                    href="{{ route('machines.index') }}">Back</a>
            </div>
            <div class="bg-white overflow-hidden p-10 shadow-xl sm:rounded-lg">
                {{-- Header 1 --}}
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between pb-10">
                        <h1 class="text-4xl dark:text-white">Detail Machine</h1>
                    </div>
                </div>

                {{-- Body --}}
                <div class="grid-cols-subgrid col-span-3">
                    <div class="grid grid-cols-3 gap-1 border-solid border-2 border-slate-700 p-1">

                        <div class="text-md p-2 font-bold">ID Mesin</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $machine->id }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Nomor Mesin</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $machine->number }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Nama Mesin</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $machine->name }}</div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</x-custom-layout>
