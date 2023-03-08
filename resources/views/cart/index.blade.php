@extends('dashboard.layout')

@section('main')
    <div class="container">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-center mb-3">Cart Anda</h1>

            <!-- DataTales Example -->
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger text-center">Cart</h6>
                </div>
                <div class="card-body">
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <a href="{{ url('/ongkir') }}" class="btn btn-success mb-2 d-block">CheckOut</a>
                    @if ($cart !== null)
                        <div class="alert alert-primary text-center" role="alert">
                            TOTAL BAYAR : <span class="fw-bold">{{ rupiah($totalBayar) }} ( Belum termasuk ongkir )</span>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-danger text-light">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Product</th>
                                    <th>Stok</th>
                                    <th>Harga Product</th>
                                    <th>Total Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($cart as $c)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{ $c->product->name }}</td>
                                        <td style="vertical-align: middle">{{ $c->stok }}</td>
                                        <td style="vertical-align: middle">{{ rupiah($c->product->harga) }}</td>
                                        <td style="vertical-align: middle">{{ rupiah($c->stok * $c->product->harga) }}</td>
                                        <td style="vertical-align: middle">
                                            <a href="{{ route('cart.edit', $c->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('cart.destroy', $c->id) }}" class="d-inline"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
