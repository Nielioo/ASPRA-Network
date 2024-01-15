<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SPKs') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4">
                <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                    href="{{ route('spks.index') }}">Back</a>
            </div>
            <div class="bg-white overflow-hidden p-10 shadow-xl sm:rounded-lg">
                <div class="col-lg-12 margin-tb">
                    <div class="flex items-center justify-between pb-10">
                        <h1 class="text-4xl dark:text-white">Detail SPK</h1>
                    </div>
                </div>

                <table class="table-auto">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>ID</strong></td>
                            <td class="border px-4 py-2 text-center">{{ $spk->id }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 bg-gray-50 dark:bg-gray-800"><strong>File Location</strong></td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ asset($spk->file_path) }}" target="_blank">{{ $spk->file_path }}</a>
                            </td>
                        </tr>
                        </tr>
                    </tbody>
                </table>

                <h1 class="text-lg dark:text-white pt-4 pb-2">File Preview</h1>
                <iframe title="SPK File" src="{{ asset($spk->file_path) }}" width="100%" height="600px">
                    This browser does not support PDFs. Please download the PDF to view it:
                    <a href="{{ asset($spk->file_path) }}">Download PDF</a>
                </iframe>

            </div>
        </div>
    </div>
    </x-app-layout>
