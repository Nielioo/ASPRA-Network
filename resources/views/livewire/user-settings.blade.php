<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <x-form-section submit="updateProfileInformation">
            <x-slot name="title">
                {{ __('Production Settings') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your production settings.') }}
            </x-slot>

            <x-slot name="form">
                <!-- Last Verifier Position -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="last_verifier_position" value="{{ __('Last Verifier Position') }}" />
                    <x-input wire:model="last_verifier_position" id="last_verifier_position" type="text" class="mt-1 block w-full" />
                    <x-input-error for="last_verifier_position" class="mt-2" />
                </div>

                <!-- Reject Percentage -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="reject_percentage" value="{{ __('Reject Percentage') }}" />
                    <x-input wire:model="reject_percentage" id="reject_percentage" type="text" class="mt-1 block w-full" />
                    <x-input-error for="reject_percentage" class="mt-2" />
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
