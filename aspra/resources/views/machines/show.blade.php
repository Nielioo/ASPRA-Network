<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between pb-10">
                        <h1 class="text-4xl dark:text-white">Detail Machine</h1>
                    </div>
                </div>

                <table class="table-auto">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>ID</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $machine->id }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Nomor Mesin</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $machine->number }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Nama Mesin</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $machine->name }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </x-app-layout>
