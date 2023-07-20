<x-app-layout>
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
                            <h2>Products</h2>
                        </div>
                        <div class="pull-right">
                            @can('product-create')
                                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                            @endcan
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Bahan</th>
                        <th>Berat</th>
                        <th>Volume</th>
                        <th>Warna</th>
                        <th>Packing</th>
                        <th>Isi Produk</th>
                        <th>Jenis Test</th>
                        <th>Outstanding</th>
                        <th>Kebutuhan per Bulan</th>
                        <th>Pengajuan Terakhir</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->kode_produk }}</td>
                            <td>{{ $product->nama_produk }}</td>
                            <td>{{ $product->bahan }}</td>
                            <td>{{ $product->berat }}</td>
                            <td>{{ $product->volume }}</td>
                            <td>{{ $product->warna }}</td>
                            <td>{{ $product->packing }}</td>
                            <td>{{ $product->isi_produk }}</td>
                            <td>{{ $product->jenis_test }}</td>
                            <td>{{ $product->outstanding }}</td>
                            <td>{{ $product->kebutuhan_per_bulan }}</td>
                            <td>{{ $product->pengajuan_terakhir }}</td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>
                                    @can('product-edit')
                                        <a class="btn btn-primary"
                                            href="{{ route('products.edit', $product->id) }}">Edit</a>
                                    @endcan

                                    @csrf
                                    @method('DELETE')
                                    @can('product-delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

                {!! $products->links() !!}

            </div>
        </div>
    </div>
</x-app-layout>
