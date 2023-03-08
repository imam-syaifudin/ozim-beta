@extends('dashboard.layout')

@section('main')
    <div class="container">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-center mb-3">Data Transaksi Anda</h1>

            <!-- DataTales Example -->
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger text-center">Transaksi</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info text-uppercase d-flex justify-content-between" role="alert">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <div>
                            Ingin Jual Produk yang sudah di beli? 
                            <a href="https://api.whatsapp.com/send/?phone=%2B6285933533979&text=Punten">Klik disini</a>
                        </div>
                        <i class="fa-solid fa-circle-exclamation"></i>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-danger text-light">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Pembeli</th>
                                    <th>Ongkir</th>
                                    <th>Id Pesanan</th>
                                    <th>Status</th>
                                    <th>Alamat Pembeli</th>
                                    <th>Total Bayar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($transaksi as $p)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{ $p->nama_pembeli }}</td>
                                        <td style="vertical-align: middle">{{ rupiah($p->ongkir) }}</td>
                                        <td style="vertical-align: middle">{{ $p->id_pesanan }}</td>
                                        <td style="vertical-align: middle" class="text-success">{{ $p->status }}</td>
                                        <td style="vertical-align: middle">{{ $p->alamat_pembeli }}</td>
                                        <td style="vertical-align: middle">{{ rupiah($p->total_bayar) }}</td>
                                        <td style="vertical-align: middle">
                                            <a href="{{ url('/dashboard/transaksi/detail/' . $p->id) }}"
                                                class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $transaksi->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
