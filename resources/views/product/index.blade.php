@extends('dashboard.layout')

@section('main')
    <div class="container">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-center mb-3">Data Product</h1>

            <!-- DataTales Example -->
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger text-center">Product</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('product.create') }}" class="btn btn-success mb-2 d-block">Add Product</a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-danger text-light">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Kategori</th>
                                    <th class="col-4">Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($product as $p)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{ $p->name }}</td>
                                        <td style="vertical-align: middle"><img src="{{ asset('storage/' . $p->gambar) }}" class="img-thumbnail shadow" width="100"></td>
                                        <td style="vertical-align: middle">{{ rupiah($p->harga) }}</td>
                                        <td style="vertical-align: middle">{{ $p->stok }}</td>
                                        <td style="vertical-align: middle">{{ $p->kategori == 'ikancupang' ? 'Ikan Cupang' : 'Alat Perawatan' }}</td>
                                        <td style="vertical-align: middle">{{ Str::limit($p->deskripsi, 120) }}</td>
                                        <td style="vertical-align: middle">
                                            <a href="{{ route('product.edit',$p->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('product.destroy',$p->id) }}" class="d-inline" method="POST">
                                                @method('DELETE') 
                                                @csrf
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <form action="{{ url('dashboard/product/cari') }}" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cari Product"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword"
                                            value="{{ request('keyword') }}">
                                        <button class="input-group-text btn btn-danger" type="submit" id="basic-addon2">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{ $product->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
