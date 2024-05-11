<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedules') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4">
                <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                    href="{{ route('schedules.index') }}">Back</a>
            </div>
            <div class="bg-white overflow-hidden p-10 shadow-xl sm:rounded-lg">
                {{-- header 1 --}}
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between pb-10">
                        <h1 class="text-4xl dark:text-white">Detail Schedule</h1>
                    </div>
                </div>

                {{-- body --}}
                @livewire('schedule.schedule-detail-component', ['schedule' => $schedule])

                {{-- header 1 --}}
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between py-10">
                        <h1 class="text-4xl dark:text-white">Detail OI Yang Bersangkutan</h1>
                    </div>
                </div>

                @livewire('oi.oi-detail-component', ['oi' => $schedule->oi])

            </div>
        </div>
    </div>
</x-custom-layout>
