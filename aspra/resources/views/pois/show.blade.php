<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('POI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Show POI</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('pois.index') }}"> Back</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>kode_poi:</strong>
                            {{ $poi->kode_poi }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>tanggal_pembuatan_poi:</strong>
                            {{ $poi->tanggal_pembuatan_poi }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>nama_customer:</strong>
                            {{ $poi->nama_customer }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>total_order:</strong>
                            {{ $poi->total_order }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>lokasi_penempatan:</strong>
                            {{ $poi->lokasi_penempatan }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>tahap_pengiriman:</strong>
                            {{ $poi->tahap_pengiriman }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>stok_akhir:</strong>
                            {{ $poi->stok_akhir }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>permintaan_khusus:</strong>
                            {{ $poi->permintaan_khusus }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>verifikasi_satu:</strong>
                            {{ $poi->verifikasi_satu }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>verifikasi_dua:</strong>
                            {{ $poi->verifikasi_dua }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>verifikasi_tiga:</strong>
                            {{ $poi->verifikasi_tiga }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>verifikasi_empat:</strong>
                            {{ $poi->verifikasi_empat }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
