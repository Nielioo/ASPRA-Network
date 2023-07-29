<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Edit Product</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Kode Produk:</strong>
                                <input type="text" name="kode_produk" class="form-control" value="{{ $product->kode_produk }}" placeholder="Kode Produk"
                                    required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama Produk:</strong>
                                <input type="text" name="nama_produk" class="form-control" value="{{ $product->nama_produk }}" placeholder="Nama Produk"
                                    required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Bahan:</strong>
                                <input type="text" name="bahan" class="form-control" value="{{ $product->bahan }}" placeholder="Bahan" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Berat:</strong>
                                <input type="text" name="berat" class="form-control" value="{{ $product->berat }}" placeholder="Berat" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Volume:</strong>
                                <input type="text" name="volume" class="form-control" value="{{ $product->volume }}" placeholder="Volume" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Warna:</strong>
                                <input type="text" name="warna" class="form-control" value="{{ $product->warna }}" placeholder="Warna" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Packing:</strong>
                                <input type="text" name="packing" class="form-control" value="{{ $product->packing }}" placeholder="Packing"
                                    required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Isi Produk:</strong>
                                <input type="text" name="isi_produk" class="form-control" value="{{ $product->isi_produk }}" placeholder="Isi Produk"
                                    required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Jenis Test:</strong>
                                <input type="text" name="jenis_test" class="form-control" value="{{ $product->jenis_test }}" placeholder="Jenis Test"
                                    required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Outstanding:</strong>
                                <input type="text" name="outstanding" class="form-control" value="{{ $product->outstanding }}" placeholder="Outstanding">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Kebutuhan per Bulan:</strong>
                                <input type="text" name="kebutuhan_per_bulan" value="{{ $product->kebutuhan_per_bulan }}" class="form-control"
                                    placeholder="Kebutuhan per Bulan">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Pengajuan Terakhir:</strong>
                                <input type="date" name="pengajuan_terakhir" value="{{ $product->penjualan_terakhir }}" class="form-control" placeholder="Pengajuan Terakhir">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
