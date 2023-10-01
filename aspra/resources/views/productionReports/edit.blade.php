<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Production Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Edit Production Report</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('productionReports.index') }}">Back</a>
                        </div>
                    </div>
                </div>

                @livewire('production-reports.form-production-report', ['productionReport' => $productionReport])

            </div>
        </div>
    </div>
</x-app-layout>
