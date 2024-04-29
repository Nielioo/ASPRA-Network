{{-- <div>
    <div class="px-4 py-2">
        <x-label for="schedule" value="{{ __('Pilih Jadwal') }}" />
        <x-input wire:model="schedule" type="text" name="schedule" :value="old('schedule')"
                class="border border-gray-300 rounded-none rounded-t-lg w-full z-10" disabled />
        <x-input type="text"
            class="border border-gray-300 rounded-none rounded-b-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="search schedules here..." wire:model="query"
            wire:keydown.escape="resetVars" wire:click.outside="resetVars" />
        <div class="overflow-y-scroll bg-white w-full" wire:loading>
            <ul class="list-outside list-none">
                <li class="p-1 border border-slate-200 cursor-pointer divide-y">
                    Searching...</li>
            </ul>
        </div>
        <div class="overflow-y-scroll bg-white w-full">
            @if (!empty($query))
                <div class="fixed top-0 right-0 bottom-0 left-0 -z-10" wire:click="resetVars"></div>
                @if (!empty($schedules))
                    @foreach ($schedules as $schedule)
                        <ul class="list-outside list-none">
                            <li class="p-2 border-x-2 border-b-2 border-slate-200 cursor-pointer divide-y hover:bg-slate-100"
                                wire:click="updateSelectedSchedule({{ $schedule['id'] }})">
                                {{ $schedule['product_name'] }}</li>
                        </ul>
                    @endforeach
                @else
                    <ul class="list-outside list-none">
                        <li class="p-1 border border-slate-200 cursor-pointer divide-y hover:bg-slate-100">
                            No result found
                        </li>
                    </ul>
                @endif
            @endif
        </div>
    </div>
</div> --}}
