{{-- Form SPK --}}

<form wire:submit.prevent="save" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        @if ($errors->any())
            <div class="px-4 py-2">
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <div>
                        <span class="font-medium">Whoops!</span> There were some problems with your input.
                        <ul class="pt-2 max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        {{-- schedule search bar --}}
        <div class="px-4 py-2">
            <x-label for="schedule" value="{{ __('Pilih Jadwal') }}" />
            @if ($selectedSchedule)
                <p class="p-2 border border-gray-300 rounded-none rounded-t-lg w-full">
                    [{{ $selectedSchedule->id }}] - ({{ $selectedSchedule->date_start }}
                    {{ $selectedSchedule->shift_start }} s.d. {{ $selectedSchedule->date_end }}
                    {{ $selectedSchedule->shift_end }}) - {{ $selectedSchedule->product_name }}
                </p>
            @else
                <p class="text-slate-400 p-2 border border-gray-300 rounded-none rounded-t-lg w-full">No schedule
                    selected. Please select schedule first.</p>
            @endif
            <x-input type="text"
                class="border border-gray-300 rounded-none rounded-b-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="search schedules here..." wire:model="query" wire:keydown.escape="resetVars"
                wire:click.outside="resetVars" />
            <div class="overflow-y-scroll bg-white w-full">
                @if (!empty($query))
                    <div class="fixed top-0 right-0 bottom-0 left-0 -z-10" wire:click="resetVars"></div>
                    @if (!empty($schedules))
                        @foreach ($schedules as $schedule)
                            <ul class="list-outside list-none">
                                <li class="p-2 border-x-2 border-b-2 border-slate-200 cursor-pointer divide-y hover:bg-slate-100"
                                    wire:click="updateSelectedSchedule({{ $schedule['id'] }})">
                                    [{{ $schedule['id'] }}] - ({{ $schedule['date_start'] }}
                                    {{ $schedule['shift_start'] }} s.d. {{ $schedule['date_end'] }}
                                    {{ $schedule['shift_end'] }}) - {{ $schedule['product_name'] }}
                                </li>
                            </ul>
                        @endforeach
                    @else
                        <ul class="list-outside list-none">
                            <li
                                class="p-2 border-x-2 border-b-2 border-slate-200 cursor-pointer divide-y hover:bg-slate-100">
                                No result found
                            </li>
                        </ul>
                    @endif
                @endif
            </div>
        </div>
        <div class="px-4 py-2">
            @if ($selectedSchedule)
                @livewire('schedule.schedule-detail-component', ['schedule' => $selectedSchedule->id])
            @endif
        </div>
        {{-- <div class="px-4 py-2">
            <x-label for="schedule" value="{{ __('Pilih Jadwal') }}" />
            // Input Dropdown
            <select wire:model="schedule"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" class="text-slate-400" selected>Select an option</option>
                @foreach ($schedules as $schedule)
                    <option value="{{ $schedule->id }}"
                        {{ $schedule->id == $this->spk->schedule_id ? 'selected' : '' }}>
                        [{{ $schedule->id }}] - {{ $schedule->product_name }} (Total Pesanan:
                        {{ $schedule->product_quantity }})</option>
                @endforeach
            </select>
            @error('schedule')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div> --}}

        <div class="px-4 py-2">
            <x-label for="file_path" value="{{ __('Unggah file SPK') }}" class="pb-1" />
            <x-input wire:model="spkFile" type="file" name="file_path" :value="old('file_path')"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required autofocus />
            @error('spkFile')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="px-4 pt-8 pb-4">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md w-full">
                {{ __($submitButtonName) }}
            </button>
        </div>
    </div>
</form>
