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

                <table class="table-auto">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>ID</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $productionReport->id }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Initial Settings</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $productionReport->initial_settings }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Date</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $productionReport->date }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Shift</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $productionReport->shift }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Approved</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $productionReport->approved }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>Rejected</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $productionReport->rejected }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </x-app-layout>
