@extends('dashboard.layout')

@section('main')
    <div class="container">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-center mb-3">Detail Transaksi</h1>

            <!-- DataTales Example -->
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger text-center">Detail Transaksi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ url(URL::previous()) }}" class="btn btn-danger mb-3">Kembali</a>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-danger text-light">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Product</th>
                                    <th>Harga</th>
                                    <th>QTY</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($detail as $p)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{ $p->nama_product }}</td>
                                        <td style="vertical-align: middle">{{ rupiah($p->harga) }}</td>
                                        <td style="vertical-align: middle">{{ $p->qty }}</td>
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
