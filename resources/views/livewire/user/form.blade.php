{{-- Form User --}}

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

        <div class="px-4 py-2">
            <x-label for="name" value="{{ __('Nama') }}" />
            <x-input wire:model="user.name" type="text" name="name" :value="old('name')" class="w-full" required />
            @error('user.name')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="uname" value="{{ __('Username') }}" />
            <x-input wire:model="user.uname" type="text" name="uname" :value="old('uname')" class="w-full" required />
            @error('user.uname')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input wire:model="user.email" type="email" name="email" :value="old('email')" class="w-full" required />
            @error('user.email')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="phone_number" value="{{ __('Nomor Whatsapp (format: 62XXXXXXXX)') }}" />
            <x-input wire:model="user.phone_number" class="w-full" type="number" name="phone_number" :value="old('phone_number', '62')"
                required />
            <x-input-error for="phone_number" />
        </div>
        <div class="px-4 py-2">
            <x-label for="position" value="{{ __('Pilih Jabatan') }}" />
            {{-- Input Dropdown --}}
            <select wire:model="user.position"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
                <option value="" class="text-slate-400" {{ is_null($this->user->position) ? 'selected' : '' }}>
                    Select an option</option>
                <option value="Employee" {{ $this->user->position == 'Employee' ? 'selected' : '' }}>
                    Employee
                </option>
                <option value="Marketing" {{ $this->user->position == 'Marketing' ? 'selected' : '' }}>
                    Marketing
                </option>
                <option value="Supervisor Marketing"
                    {{ $this->user->position == 'Supervisor Marketing' ? 'selected' : '' }}>
                    Supervisor Marketing
                </option>
                <option value="Manager" {{ $this->user->position == 'Manager' ? 'selected' : '' }}>
                    Manager
                </option>
                <option value="Director" {{ $this->user->position == 'Director' ? 'selected' : '' }}>
                    Director
                </option>
                <option value="Supervisor PPIC" {{ $this->user->position == 'Supervisor PPIC' ? 'selected' : '' }}>
                    Supervisor PPIC
                </option>
            </select>
            @error('user.position')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="px-4 py-2">
            <x-label for="selectedRole" value="{{ __('Pilih Role') }}" />

            {{-- Input Dropdown --}}
            {{-- <select wire:model="selectedRole"
                class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
                <option value="" class="text-slate-400"
                    {{ is_null($selectedRole) ? 'selected' : '' }}>Select an option</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $selectedRole == $role ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select> --}}

            {{-- Input Checkbox --}}
            @foreach ($roles as $role)
                <div class="flex items-center py-1">
                    <input wire:model="selectedRoles" type="checkbox" id="{{ $role->name }}"
                        value="{{ $role->id }}"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        {{ in_array($role->id, $this->selectedRoles ?? []) ? 'checked' : '' }}>
                    <x-label for="{{ $role->name }}" class="ms-2" value="{{ $role->name }}" />
                </div>
            @endforeach
            @error('selectedRole')
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
