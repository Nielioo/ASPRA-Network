<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Production Reports') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-8 shadow-md sm:rounded-lg">
                <div class="col-lg-12 margin-tb">



                    <div
                        class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                        <div>
                            {{-- Month Filter --}}
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
                        </div>

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
                                    <th scope="col" rowspan="3" class="px-4 py-1 border-2 border-gray-300">
                                        Mesin
                                    </th>
                                    <th scope="col" rowspan="3" class="px-4 py-1 border-2 border-gray-300">
                                        Nama Produk
                                    </th>
                                    <th scope="col" rowspan="3" class="px-4 py-1 border-2 border-gray-300">
                                        Output STD / Shift
                                    </th>
                                    <th scope="col" colspan="10" class="px-4 py-1 border-2 border-gray-300">
                                        Hasil Produksi
                                    </th>
                                    <th scope="col" colspan="5" class="px-4 py-1 border-2 border-gray-300">
                                        Reject
                                    </th>
                                    <th scope="col" rowspan="3" class="px-4 py-1 border-2 border-gray-300">
                                        Order (OI)
                                    </th>
                                    <th scope="col" rowspan="3" class="px-4 py-1 border-2 border-gray-300">
                                        Grand Total Produksi
                                    </th>
                                    <th scope="col" rowspan="3" class="px-4 py-1 border-2 border-gray-300">
                                        Grand Total Reject
                                    </th>
                                    <th scope="col" rowspan="3" class="px-4 py-1 border-2 border-gray-300">
                                        Outstanding (Sisa OI)
                                    </th>
                                    <th scope="col" colspan="3" rowspan="2"
                                        class="px-4 py-1 border-2 border-gray-300">
                                        Keterangan
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" rowspan="2" class="px-4 py-1 border-2 border-gray-300 whitespace-nowrap">
                                        Shift 1
                                    </th>
                                    <th scope="col" colspan="2" class="px-4 py-1 border-2 border-gray-300">
                                        Pencapaian
                                    </th>
                                    <th scope="col" rowspan="2" class="px-4 py-1 border-2 border-gray-300 whitespace-nowrap">
                                        Shift 2
                                    </th>
                                    <th scope="col" colspan="2" class="px-4 py-1 border-2 border-gray-300">
                                        Pencapaian
                                    </th>
                                    <th scope="col" rowspan="2" class="px-4 py-1 border-2 border-gray-300 whitespace-nowrap">
                                        Shift 3
                                    </th>
                                    <th scope="col" colspan="2" class="px-4 py-1 border-2 border-gray-300">
                                        Pencapaian
                                    </th>
                                    <th scope="col" rowspan="2" class="px-4 py-1 border-2 border-gray-300">
                                        TOTAL
                                    </th>
                                    <th scope="col" rowspan="2" class="px-4 py-1 border-2 border-gray-300 whitespace-nowrap">
                                        Shift 1
                                    </th>
                                    <th scope="col" rowspan="2" class="px-4 py-1 border-2 border-gray-300 whitespace-nowrap">
                                        Shift 2
                                    </th>
                                    <th scope="col" rowspan="2" class="px-4 py-1 border-2 border-gray-300 whitespace-nowrap">
                                        Shift 3
                                    </th>
                                    <th scope="col" rowspan="2" class="px-4 py-1 border-2 border-gray-300">
                                        TOTAL
                                    </th>
                                    <th scope="col" rowspan="2" class="px-4 py-1 border-2 border-gray-300">
                                        %Reject
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-4 py-1 border-2 border-gray-300">%</th>
                                    <th scope="col" class="px-4 py-1 border-2 border-gray-300">Grade</th>
                                    <th scope="col" class="px-4 py-1 border-2 border-gray-300">%</th>
                                    <th scope="col" class="px-4 py-1 border-2 border-gray-300">Grade</th>
                                    <th scope="col" class="px-4 py-1 border-2 border-gray-300">%</th>
                                    <th scope="col" class="px-4 py-1 border-2 border-gray-300">Grade</th>
                                    <th scope="col" class="px-4 py-1 border-2 border-gray-300 whitespace-nowrap">
                                        Shift 1
                                    </th>
                                    <th scope="col" class="px-4 py-1 border-2 border-gray-300 whitespace-nowrap">
                                        Shift 2
                                    </th>
                                    <th scope="col" class="px-4 py-1 border-2 border-gray-300 whitespace-nowrap">
                                        Shift 3
                                    </th>
                                </tr>

                            </thead>
                            <tbody class="text-left">
                                @forelse ($productionReports->groupby('schedule_id') as $schedule_id => $reports)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-600">
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ optional($reports->first())->schedule->machine->name }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ optional($reports->first())->product->name }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ optional($reports->first())->schedule->output_std_per_shift }}
                                        </td>
                                        {{-- Total Approved per Shift --}}
                                        @foreach (['Shift 1', 'Shift 2', 'Shift 3'] as $shift)
                                            @php
                                                $currentReport = optional($reports->firstWhere('shift', $shift));
                                            @endphp
                                            <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                                {{ $currentReport->total_approved ?? '-' }}
                                            </td>
                                            <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                                {{ $currentReport->shift ? ($currentReport->total_approved / $currentReport->schedule->output_std_per_shift) * 100 : '-' }}
                                            </td>
                                            <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                                @if ($currentReport->shift)
                                                    @php
                                                        $percentage =
                                                            ($currentReport->total_approved /
                                                                $currentReport->schedule->output_std_per_shift) *
                                                            100;
                                                        if ($percentage >= 95) {
                                                            $result = 'A';
                                                        } elseif ($percentage >= 86) {
                                                            $result = 'B';
                                                        } else {
                                                            $result = 'C';
                                                        }
                                                    @endphp
                                                @else
                                                    @php
                                                        $result = '-';
                                                    @endphp
                                                @endif
                                                {{ $result }}
                                            </td>
                                        @endforeach
                                        {{-- Grand Total Approved --}}
                                        @php
                                            $grandTotalApproved = 0;
                                        @endphp
                                        @foreach (['Shift 1', 'Shift 2', 'Shift 3'] as $shift)
                                            @php
                                                $currentReport = $reports->firstWhere('shift', $shift);
                                                if ($currentReport) {
                                                    $grandTotalApproved += $currentReport->total_approved;
                                                }
                                            @endphp
                                        @endforeach
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ $grandTotalApproved }}
                                        </td>
                                        {{-- Total Reject per Shift --}}
                                        @foreach (['Shift 1', 'Shift 2', 'Shift 3'] as $shift)
                                            @php
                                                $currentReport = optional($reports->firstWhere('shift', $shift));
                                            @endphp
                                            <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                                {{ $currentReport->total_rejected ?? '-' }}
                                            </td>
                                        @endforeach
                                        {{-- Grand Total Rejected --}}
                                        @php
                                            $grandTotalRejected = 0;
                                        @endphp
                                        @foreach (['Shift 1', 'Shift 2', 'Shift 3'] as $shift)
                                            @php
                                                $currentReport = $reports->firstWhere('shift', $shift);
                                                if ($currentReport) {
                                                    $grandTotalRejected += $currentReport->total_rejected;
                                                }
                                            @endphp
                                        @endforeach
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ $grandTotalRejected }}
                                            {{-- {{ optional($reports->first())->product->grand_total_rejected }} --}}
                                        </td>
                                        {{-- % Rejected --}}
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ rtrim(number_format(($grandTotalRejected / $grandTotalApproved) * 100, 3), '0') }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ optional($reports->first())->schedule->oi->total_order }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ optional($reports->first())->product->remaining_stock }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ optional($reports->first())->product->grand_total_rejected }}
                                        </td>
                                        <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                            {{ optional($reports->first())->product->outstanding }}
                                        </td>
                                        {{-- Report Description --}}
                                        @foreach (['Shift 1', 'Shift 2', 'Shift 3'] as $shift)
                                            @php
                                                $currentReport = optional($reports->firstWhere('shift', $shift));
                                            @endphp
                                            <td class="px-4 py-2 border-2 border-gray-300 whitespace-nowrap">
                                                {{ $currentReport->description ?? '-' }}
                                            </td>
                                        @endforeach

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
                        {!! $productionReports->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-custom-layout>
