<div>
    <div>
        <x-input id="groupname" type="text" class="block" placeholder="{{$selectedSchedule ? $selectedSchedule : 'search schedules...'}}" wire:model="query"
            wire:keydown.escape="resetVars" wire:click.outside="resetVars"/>
        @if ($selectedSchedule)
            <p>Selected Schedule: {{ $selectedSchedule }}</p>
        @endif
        <div class="overflow-y-scroll absolute bg-white w-full " wire:loading>
            <ul class="list-outside list-none">
                <li class="p-1 border border-slate-200 cursor-pointer divide-y">
                    Searching...</li>
            </ul>
        </div>
        <div class="max-h-44 overflow-y-scroll absolute bg-white w-full">
            @if (!empty($query))
                <div class="fixed top-0 right-0 bottom-0 left-0 -z-10" wire:click="resetVars"></div>
                @if (!empty($schedules))
                    @foreach ($schedules as $schedule)
                        <ul class="list-outside list-none">
                            <li class="p-1 border border-slate-200 cursor-pointer divide-y hover:bg-slate-100"
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
</div>
