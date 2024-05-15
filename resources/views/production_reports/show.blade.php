<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Production Reports') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4">
                <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                    href="{{ route('production_reports.index') }}">Back</a>
            </div>
            <div class="bg-white overflow-hidden p-10 shadow-xl sm:rounded-lg">
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between pb-10">
                        <h1 class="text-4xl dark:text-white">Detail Production Report</h1>
                    </div>
                </div>

                <table class="table-auto" style="width: 75%;">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>schedule_id</strong></td>
                            <td class="border px-4 py-2">{{ $productionReport->schedule_id }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800">
                                <strong>output_std_per_shift</strong>
                            </td>
                            <td class="border px-4 py-2">
                                {{ $productionReport->schedule->output_std_per_shift }}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="table-auto" style="width: 75%;">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>ID</strong></td>
                            <td class="border px-4 py-2">{{ $productionReport->id }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>type</strong></td>
                            <td class="border px-4 py-2">{{ $productionReport->type }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>date</strong></td>
                            <td class="border px-4 py-2">{{ $productionReport->date }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>shift</strong></td>
                            <td class="border px-4 py-2">{{ $productionReport->shift }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>total_approved</strong>
                            </td>
                            <td class="border px-4 py-2">{{ $productionReport->total_approved }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Persentase Pencapaian
                                    (%)</strong></td>
                            <td class="border px-4 py-2">
                                {{ ($productionReport->total_approved / $productionReport->schedule->output_std_per_shift) * 100 }}%
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Grade Pencapaian</strong>
                            </td>
                            <td class="border px-4 py-2">
                                @php
                                    $percentage =
                                        ($productionReport->total_approved /
                                            $productionReport->schedule->output_std_per_shift) *
                                        100;
                                    if ($percentage >= 95) {
                                        $result = 'A';
                                    } elseif ($percentage == 0) {
                                        $result = '-';
                                    } elseif ($percentage >= 86) {
                                        $result = 'B';
                                    } else {
                                        $result = 'C';
                                    }
                                @endphp
                                {{ $result }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>total_rejected</strong>
                            </td>
                            <td class="border px-4 py-2">{{ $productionReport->total_rejected }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>description</strong></td>
                            <td class="border px-4 py-2">{{ $productionReport->description }}</td>
                        </tr>
                    </tbody>
                </table>

                <br>

                <table class="table-auto" style="width: 75%;">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>product_id</strong></td>
                            <td class="border px-4 py-2">{{ $productionReport->product_id }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>product_name</strong></td>
                            <td class="border px-4 py-2">{{ $productionReport->product->name }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Total Order (sesuai
                                    oi)</strong></td>
                            <td class="border px-4 py-2">{{ $productionReport->schedule->oi->total_order }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Total produk yang sudah di
                                    produksi (di gudang)</strong></td>
                            <td class="border px-4 py-2">{{ $productionReport->product->remaining_stock }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Total reject keseluruhan</strong></td>
                            <td class="border px-4 py-2">{{ $productionReport->product->grand_total_rejected }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Outstanding (Sisa
                                    OI)</strong></td>
                            <td class="border px-4 py-2">{{ $productionReport->product->outstanding }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-custom-layout>
