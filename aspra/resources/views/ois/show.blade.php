<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('OIs') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4">
                <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                    href="{{ route('ois.index') }}">Back</a>
            </div>
            <div class="bg-white overflow-hidden p-10 shadow-xl sm:rounded-lg">
                <div class="col-lg-12 margin-tb flex items-end justify-between pb-10">
                    <h1 class="text-4xl dark:text-white">Detail OI</h1>
                    @livewire('oi.export-pdf', ['oi' => $oi])
                </div>

                @livewire('oi.oi-detail-component', ['oi' => $oi])

                <div class="mt-8">
                    @livewire('oi.verify-order', ['oi' => $oi])
                </div>

                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between py-10">
                        <h1 class="text-4xl dark:text-white">Riwayat Verifikasi OI</h1>
                    </div>
                </div>

                <table class="w-full border border-gray-200 text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">id</th>
                            <th scope="col" class="px-6 py-3">status</th>
                            <th scope="col" class="px-6 py-3">verifier_name</th>
                            <th scope="col" class="px-6 py-3">verifier order</th>
                            <th scope="col" class="px-6 py-3">updated_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($oi->verifications as $verification)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $verification->id }}</td>
                                <td class="px-6 py-4">{{ $verification->status }}</td>
                                <td class="px-6 py-4">{{ $verification->verifier_name }}</td>
                                <td class="px-6 py-4">{{ $verification->verifier_order }}</td>
                                <td class="px-6 py-4">{{ $verification->updated_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center">No verifications has been made.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- <div class="mt-8">
                    <a class="bg-lime-500 hover:bg-lime-700 text-lime-950 hover:text-white font-semibold py-2 px-4 border border-lime-500 hover:border-transparent rounded"
                        href="{{ route('ois.verify', $oi->id) }}">Verify OI</a>
                </div> --}}

            </div>
        </div>
    </div>
</x-custom-layout>
