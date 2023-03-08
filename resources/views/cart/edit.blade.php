@extends('dashboard.layout')

@section('main')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">Form Edit Cart</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('cart.update',$cart->id) }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Product : </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Stok"
                            name="stok" value="{{ $cart->product->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Stok : </label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Stok"
                            name="stok" value="{{ $cart->stok }}" min="1" max="{{ $cart->product->stok }}">
                    </div>
                      <button type="submit" class="btn btn-danger mt-2">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
