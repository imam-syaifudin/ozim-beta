@extends('home.layout')

@section('main')
    <div class="container">

        <section class="text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Ozim Beta Gallery</h1>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-lg-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-danger text-center">Detail Product</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset('storage/' . $product->gambar) }}" alt=""
                                    class="shadow-sm rounded" style="border: 3px solid rgb(156, 0, 0)" width="500"
                                    height="500">
                            </div>
                            <div class="col-lg-6 mt-1">
                                <hr>
                                <h5>Nama Product : {{ $product->name }}</h5>
                                <hr>
                                <h5>Harga : {{ $product->harga }}</h5>
                                <hr>
                                <h5>Kategori : {{ $product->kategori == 'ikancupang' ? 'Ikan Cupang' : 'Alat Perawatan' }}
                                </h5>
                                <hr>
                                <h5>Stok : {{ $product->stok }}</h5>
                                <hr>
                                <h5>deskripsi : <br><br><span style="font-size: 14px;">{{ $product->deskripsi }}</span></h5>
                                <hr>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <a href="{{ url('/index') }}" class="btn btn-danger d-block mb-2">Kembali</a>
                                    @if( !$productInCard )
                                    <a type="button" class="btn btn-primary d-block" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Add to Cart
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Modal Cart Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header text-center">
                    <h1 class="modal-title fs-5 text-center text-light" id="exampleModalLabel">{{ $product->name }}</h1>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal"
                        aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 d-flex justify-content-center">
                            <img src="{{ asset('storage/' . $product->gambar) }}" alt="" class="shadow-sm rounded img-fluid">
                        </div>
                        <div class="col-lg-6 d-flex flex-column">
                            <form action="{{ route('cart.store') }}" method="POST" class="d-flex flex-column">
                                @csrf
                                <label for="" class="form-label text-light text-center">Stok Poduct (
                                    {{ $product->stok }} )</label>
                                <input type="hidden" name="productid" value="{{ $product->id }}">
                                <input type="number" class="form-control" min="1" max="{{ $product->stok }}"
                                    placeholder="Masukkan jumlah product" name="stok" required>
                                <button class="btn btn-danger mt-2 d-block text-center" type="submit">Add To Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
