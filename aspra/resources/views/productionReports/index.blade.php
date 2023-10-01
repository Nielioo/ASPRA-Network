<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Production Reports') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-xl sm:rounded-lg">
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between pb-10">
                        <h1 class="text-4xl dark:text-white">Production Reports</h2>
                    </div>
                    <div class="flex items-center justify-between pb-4">
                        {{-- @can('production-report-create') --}}
                            <a class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded"
                                href="{{ route('productionReports.create') }}">Create New Production Report</a>
                        {{-- @endcan --}}

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
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
                    <table class="w-full border border-gray-200 text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                {{-- <th scope="col" class="px-6 py-3">No</th> --}}
                                <th scope="col" class="px-6 py-3">Kode Laporan</th>
                                <th scope="col" class="px-6 py-3">Setting Awal</th>
                                <th scope="col" class="px-6 py-3">Tanggal</th>
                                <th scope="col" class="px-6 py-3">Approved</th>
                                <th scope="col" class="px-6 py-3">Rejected</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productionReports as $productionReport)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    {{-- <td class="px-6 py-4">{{ ++$i }}</td> --}}
                                    <td class="px-6 py-4">{{ $productionReport->kode_laporan }}</td>
                                    <td class="px-6 py-4">{{ $productionReport->setting_awal }}</td>
                                    <td class="px-6 py-4">{{ $productionReport->tanggal }}</td>
                                    <td class="px-6 py-4">{{ $productionReport->approved }}</td>
                                    <td class="px-6 py-4">{{ $productionReport->rejected }}</td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('productionReports.destroy', $productionReport->id) }}" method="POST">
                                            <a class="btn btn-info"
                                                href="{{ route('productionReports.show', $productionReport->id) }}">Show</a>
                                            {{-- @can('production-report-edit') --}}
                                                <a class="btn btn-primary"
                                                    href="{{ route('productionReports.edit', $productionReport->id) }}">Edit</a>
                                            {{-- @endcan --}}

                                            @csrf
                                            @method('DELETE')
                                            {{-- @can('production-report-delete') --}}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            {{-- @endcan --}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pt-5">
                    {!! $productionReports->links() !!}
                </div>

            </div>
        </div>
    </div>
    </x-app-layout>
