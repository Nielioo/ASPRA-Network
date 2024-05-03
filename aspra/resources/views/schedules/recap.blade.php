<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedules') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-8 shadow-md sm:rounded-lg">
                <div class="col-lg-12 margin-tb">

                    <div
                        class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                        {{-- Export to Excel --}}
                        <a class="bg-lime-500 hover:bg-lime-700 font-bold text-black hover:text-white py-2 px-4 rounded"
                            href="{{ route('schedules.recap.exportToExcel') }}">
                            Export to Excel
                        </a>
                        {{-- <!-- Month Filter -->
                        <div>
                            <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                type="button">
                                <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                </svg>
                                Last 30 days
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownRadio"
                                class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                                data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownRadioButton">
                                    <li>
                                        <div
                                            class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="filter-radio-example-1" type="radio" value=""
                                                name="filter-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="filter-radio-example-1"
                                                class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                                day</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div
                                            class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input checked="" id="filter-radio-example-2" type="radio"
                                                value="" name="filter-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="filter-radio-example-2"
                                                class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                                7 days</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div
                                            class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="filter-radio-example-3" type="radio" value=""
                                                name="filter-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="filter-radio-example-3"
                                                class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                                30 days</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div
                                            class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="filter-radio-example-4" type="radio" value=""
                                                name="filter-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="filter-radio-example-4"
                                                class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                                month</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div
                                            class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="filter-radio-example-5" type="radio" value=""
                                                name="filter-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="filter-radio-example-5"
                                                class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                                year</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}

                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search"
                                class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search for items">
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="table-auto w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300">
                                        No. Mesin
                                    </th>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300">
                                        Nama Mesin
                                    </th>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300">
                                        Nama Produk
                                    </th>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300">
                                        Jumlah yang ingin diproduksi
                                    </th>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300">
                                        Output STD / Shift
                                    </th>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300">
                                        Tanggal Mulai Produksi
                                    </th>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300">
                                        Shift Mulai Produksi
                                    </th>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300">
                                        Tanggal Selesai Produksi
                                    </th>
                                    <th scope="col" class="px-4 py-2 border-2 border-gray-300">
                                        Shift Selesai Produksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-left">
                                @forelse ($schedules as $schedule)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-600">
                                        <td class="px-4 py-2 border-2 border-gray-300 text-center whitespace-nowrap">
                                            {{ $schedule->machine->number }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ $schedule->machine->name }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ $schedule->product_name }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ $schedule->product_quantity }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ $schedule->output_std_per_shift }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ $schedule->date_start }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ $schedule->shift_start }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ $schedule->date_end }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ $schedule->shift_end }}
                                        </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="25" class="px-6 py-4 border-2 border-gray-300 text-center">
                                            No report has been made.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-5">
                        {!! $schedules->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-custom-layout>
