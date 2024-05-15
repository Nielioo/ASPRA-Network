<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm md:text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-8 shadow-md sm:rounded-lg">
                <div class="col-lg-12 margin-tb">
                    <h2 class="font-semibold text-xl text-center text-gray-800">
                        {{ __('Tabel Realtime Hasil Produksi') }}
                    </h2>
                    <h2 class="font-semibold text-lg text-center text-gray-800">
                        @livewire('dashboard.current-hour')
                    </h2>
                    <div class="p-4"></div>

                    <div class="overflow-x-auto">
                        <table class="table-auto w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" rowspan="2" class="px-4 py-2 border-2 border-gray-300">
                                        Cell
                                    </th>
                                    <th scope="col" rowspan="2" class="px-4 py-2 border-2 border-gray-300">
                                        Style
                                    </th>
                                    <th scope="col" colspan="2" class="px-4 py-2 border-2 border-gray-300">
                                        Assembling
                                    </th>
                                    <th scope="col" colspan="2" class="px-4 py-2 border-2 border-gray-300">
                                        Total
                                    </th>
                                    <th scope="col" rowspan="2" class="px-4 py-2 border-2 border-gray-300">
                                        RFT
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                        In
                                    </th>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                        Out
                                    </th>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                        In
                                    </th>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                        Out
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-left">
                                @for ($i = 0; $i < 4; $i++)
                                    <tr>
                                        <td class="px-6 py-6 border-2 border-gray-300 text-center">
                                            Cell {{ $i + 1 }}
                                        </td>
                                        <td class="px-6 py-6 border-2 border-gray-300 text-center">
                                            480
                                        </td>
                                        <td class="px-6 py-6 border-2 border-gray-300 text-center">
                                            42
                                        </td>
                                        <td class="px-6 py-6 border-2 border-gray-300 text-center">
                                            42
                                        </td>
                                        <td class="px-6 py-6 border-2 border-gray-300 text-center">
                                            42
                                        </td>
                                        <td class="px-6 py-6 border-2 border-gray-300 text-center">
                                            42
                                        </td>
                                        <td class="px-6 py-6 border-2 border-gray-300 text-center">
                                            42
                                        </td>
                                    </tr>
                                @endfor

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-custom-layout>
