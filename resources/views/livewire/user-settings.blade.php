<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <x-form-section submit="save">
            <x-slot name="title">
                {{ __('Production Settings') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your production settings.') }}
            </x-slot>

            <x-slot name="form">
                <!-- Final Verifier Position -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="final_verifier_position" value="{{ __('Final Verifier Position') }}" />
                    {{-- <x-input wire:model="final_verifier_position" id="final_verifier_position" type="text" class="mt-1 block w-full" /> --}}
                    <select wire:model="setting.final_verifier_position"
                        class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option value="" class="text-slate-400"
                            {{ is_null($this->setting->final_verifier_position) ? 'selected' : '' }}>
                            Select an option</option>
                        <option value="Employee" {{ $this->setting->final_verifier_position == 'Employee' ? 'selected' : '' }}>
                            Employee
                        </option>
                        <option value="Marketing" {{ $this->setting->final_verifier_position == 'Marketing' ? 'selected' : '' }}>
                            Marketing
                        </option>
                        <option value="Supervisor Marketing"
                            {{ $this->setting->final_verifier_position == 'Supervisor Marketing' ? 'selected' : '' }}>
                            Supervisor Marketing
                        </option>
                        <option value="Manager" {{ $this->setting->final_verifier_position == 'Manager' ? 'selected' : '' }}>
                            Manager
                        </option>
                        <option value="Director" {{ $this->setting->final_verifier_position == 'Director' ? 'selected' : '' }}>
                            Director
                        </option>
                        <option value="Supervisor PPIC"
                            {{ $this->setting->final_verifier_position == 'Supervisor PPIC' ? 'selected' : '' }}>
                            Supervisor PPIC
                        </option>
                    </select>
                    <x-input-error for="setting.final_verifier_position" class="mt-2" />
                </div>

                <!-- Reject Percentage -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="reject_percentage" value="{{ __('Reject Percentage') }}" />
                    <x-input wire:model="setting.reject_percentage" id="reject_percentage" type="text"
                        class="mt-1 block w-full" />
                    <x-input-error for="setting.reject_percentage" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>

                <x-button wire:loading.attr="disabled" wire:target="photo">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </x-form-section>

    </div>
</div>
