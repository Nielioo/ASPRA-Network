<div>
    <div class="col-lg-12 margin-tb">
        <div class="flex items-center justify-between pb-4">
            {{-- @can('machine-create') --}}
            <a class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded" href="{{ route('machines.create') }}">
                Create New Machine</a>
            {{-- @endcan --}}

            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model="tableSearch" type="text" id="table-search"
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

                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Nomor Mesin</th>
                    <th scope="col" class="px-6 py-3">Nama Mesin</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($machines as $machine)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $machine->id }}</td>
                        <td class="px-6 py-4">{{ $machine->number }}</td>
                        <td class="px-6 py-4">{{ $machine->name }}</td>
                        <td class="px-6 py-4 flex flex-col md:flex-row">
                            <form action="{{ route('machines.destroy', $machine->id) }}" method="POST"
                                class="flex flex-col md:flex-row">
                                @csrf

                                <a class="inline-block bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-2 rounded mb-2 md:mb-0 md:mr-2"
                                    href="{{ route('machines.show', $machine->id) }}">
                                    <i class="fas fa-eye fa-lg"></i>
                                </a>
                                {{-- @can('machine-edit') --}}
                                <a class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded mb-2 md:mb-0 md:mr-2"
                                    href="{{ route('machines.edit', $machine->id) }}">
                                    <i class="fas fa-pencil fa-lg"></i>
                                </a>
                                {{-- @endcan --}}

                                {{-- @can('machine-delete') --}}
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
                                    <i class="fas fa-trash fa-lg"></i>
                                </button>
                                {{-- @endcan --}}
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center">No machine has been made.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pt-5">
        {!! $machines->links() !!}
    </div>
</div>
