@extends('home.layout')

@section('main')
    <div class="container">
        <main>

            <section class="text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Product Kami</h1>
                    </div>
                </div>
            </section>

            <div class="album py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <form action="{{ url('/product/cari') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari Product"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword"
                                        value="{{ request('keyword') }}">
                                    <button class="input-group-text btn btn-danger" type="submit" id="basic-addon2">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            {{ $product->links() }}
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach ($product as $pro)
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('storage/' . $pro->gambar) }}"
                                        class="bd-placeholder-img card-img-top" width="100%" height="225"
                                        alt="">
                                    <div class="card-body">
                                        <p><strong>{{ $pro->name }}</strong></p>
                                        <p class="card-text">{{ Str::limit($pro->deskripsi, 120) }}</p>
                                        <p class="fw-bold">{{ rupiah($pro->harga) }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{ route('product.show.index', $pro->id) }}"
                                                    class="btn btn-sm btn-primary">View</a>
                                            </div>
                                            <small
                                                class="text-muted">{{ $pro->kategori == 'ikancupang' ? 'Ikan Cupang' : 'Alat Perawatan' }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            {{ $product->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
@endsection
