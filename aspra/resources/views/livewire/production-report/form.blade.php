{{-- Form Production Report --}}
<form wire:submit.prevent="save" method="POST">
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
                            <li class="p-2 border-x-2 border-b-2 border-slate-200 cursor-pointer divide-y hover:bg-slate-100">
                                No result found
                            </li>
                        </ul>
                    @endif
                @endif
            </div>
        </div>
        {{-- @livewire('schedule.schedule-search-bar',['schedules' => $schedules]) --}}

        {{-- <div class="px-4 py-2">
            <x-label for="schedule" value="{{ __('Pilih Jadwal') }}" />
            // Input Dropdown
            <select wire:model="schedule"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" class="text-slate-400" selected>Select an option</option>
                @foreach ($schedules as $schedule)
                    <option value="{{ $schedule->id }}"
                        {{ $schedule->id == $this->productionReport->schedule_id ? 'selected' : '' }}>
                        [{{ $schedule->id }}] - ({{ $schedule->date_start }} {{ $schedule->shift_start }} s.d. {{ $schedule->date_end }} {{ $schedule->shift_end }}) - {{ $schedule->product_name }} </option>
                @endforeach
            </select>
            @error('schedule')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div> --}}

        @if ($selectedSchedule)
            <div class="px-4 py-2">
                <div class="grid-cols-subgrid col-span-3">
                    <div class="grid grid-cols-3 gap-1 border-solid border-2 border-slate-700 p-1">

                        <div class="text-md p-2 font-bold">Schedule_ID</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $selectedSchedule->id }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Mesin yang digunakan</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">[{{ $selectedSchedule->machine->id }}] -
                                {{ $selectedSchedule->machine->name }}
                            </div>
                        </div>
                        <div class="text-md p-2 font-bold">Nama Produk yang ingin di produksi</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">[{{ $selectedSchedule->oi->product->product_code }}] -
                                {{ $selectedSchedule->product_name }}
                            </div>
                        </div>
                        <div class="text-md p-2 font-bold">Jumlah Produk yang ingin di produksi</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $selectedSchedule->product_quantity }}</div>
                        </div>
                        <div class="text-md p-2 font-bold">Jadwal mulai produksi</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $selectedSchedule->date_start }}
                                ({{ $selectedSchedule->shift_start }})</div>
                        </div>
                        <div class="text-md p-2 font-bold">Jadwal selesai produksi</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $selectedSchedule->date_end }}
                                ({{ $selectedSchedule->shift_end }})</div>
                        </div>
                        <div class="text-md p-2 font-bold">Output STD / Shift</div>
                        <div class="grid-cols-subgrid col-span-2">
                            <div class="text-md p-2">{{ $selectedSchedule->output_std_per_shift }}</div>
                        </div>

                    </div>
                </div>
            </div>
        @endif

        <div class="px-4 py-2">
            <x-label for="type" value="{{ __('Pilih tipe produksi') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="productionReport.type"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
                <option value="" class="text-slate-400" selected>Select an option</option>
                <option value="INJECT" {{ $this->productionReport->type == 'INJECT' ? 'selected' : '' }}>INJECT
                </option>
                <option value="BLOW" {{ $this->productionReport->type == 'BLOW' ? 'selected' : '' }}>BLOW</option>
            </select>
            @error('productionReport.type')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="date" value="{{ __('Tanggal pembuatan laporan produksi') }}" />
            <x-input wire:model="productionReport.date" type="date" name="date" :value="old('date')" class="w-full"
                required />
            @error('productionReport.date')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="shift" value="{{ __('Pilih Shift') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="productionReport.shift"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" class="text-slate-400" selected>Select an option</option>
                <option value="Shift 1" {{ $this->productionReport->shift == 'Shift 1' ? 'selected' : '' }}>Shift 1
                </option>
                <option value="Shift 2" {{ $this->productionReport->shift == 'Shift 2' ? 'selected' : '' }}>Shift 2
                </option>
                <option value="Shift 3" {{ $this->productionReport->shift == 'Shift 3' ? 'selected' : '' }}>Shift 3
                </option>
            </select>
            @error('productionReport.shift')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="total_approved" value="{{ __('Total produk yang sudah terealisasi') }}" />
            <x-input wire:model="productionReport.total_approved" type="number" name="total_approved" :value="old('total_approved')"
                class="w-full" required />
            @error('productionReport.total_approved')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="total_rejected" value="{{ __('Total produk reject') }}" />
            <x-input wire:model="productionReport.total_rejected" type="number" name="total_rejected" :value="old('total_rejected')"
                class="w-full" required />
            @error('productionReport.total_rejected')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="description" value="{{ __('Keterangan Tambahan') }}" />
            <x-input wire:model="productionReport.description" type="text" name="description" :value="old('description')"
                class="w-full" />
            @error('productionReport.description')
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
