<div>
    <x-label for="user" value="{{ __('Pilih pengguna selanjutnya yang akan melakukan pengecekan') }}" />
    <div class="flex justify-between">
        <div class="flex-grow pe-2">
            @if ($selectedUser)
                <p class="p-2 border border-gray-300 rounded-none rounded-t-lg w-full">
                    {{ $selectedUser->name }} [{{ $selectedUser->position }}] - {{ $selectedUser->phone_number }}
                </p>
            @else
                <p class="text-slate-400 p-2 border border-gray-300 rounded-none rounded-t-lg w-full">No user
                    selected. Please select user first.</p>
            @endif
            <x-input type="text"
                class="border border-gray-300 rounded-none rounded-b-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="search users here..." wire:model="userQuery" wire:keydown.escape="resetVars"
                wire:click.outside="resetVars" />
            <div class="overflow-y-scroll bg-white w-full">
                @if (!empty($userQuery))
                    <div class="fixed top-0 right-0 bottom-0 left-0 -z-10" wire:click="resetVars"></div>
                    @if (!empty($users))
                        @foreach ($users as $user)
                            <ul class="list-outside list-none">
                                <li class="p-2 border-x-2 border-b-2 border-slate-200 cursor-pointer divide-y hover:bg-slate-100"
                                    wire:click="updateSelectedUser({{ $user['id'] }})">
                                    {{ $user['name'] }} [{{ $user['position'] }}] - {{ $user['phone_number'] }}
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

        <button onclick="confirmWhatsappNotification('notify')"
            class="bg-sky-400 hover:bg-sky-700 text-black hover:text-white font-semibold py-2 px-4 border border-sky-400 hover:border-transparent rounded">
            Notify
        </button>
    </div>
</div>

<script>
    function confirmWhatsappNotification(param) {
        if (confirm("Are you sure you want to " + param.toUpperCase() + "?")) {
            @this.call(param)
        }
    }
</script>
