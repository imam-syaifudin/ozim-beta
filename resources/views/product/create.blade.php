@extends('dashboard.layout')

@section('main')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">Form Tambah Product</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Product : </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ikan Cupang"
                            name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Gambar : </label>
                        <img src="" id="blah" class="img-thumbnail mb-3 shadow-sm" width="200">
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Harga : </label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="harga"
                            placeholder="100000">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Stok : </label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="stok"
                            placeholder="20">
                    </div>


                    <label for="exampleFormControlInput1" class="form-label">Kategori : </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" value="ikancupang"
                        id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Ikan Cupang
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" value="alatperawatan"
                            id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Alat Perawatan
                        </label>
                    </div>

                    
                    <label for="exampleFormControlInput1" class="form-label mt-4">Deskripsi : </label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px" name="deskripsi"></textarea>
                        <label for="floatingTextarea2">Deskripsi</label>
                      </div>    
                      <button type="submit" class="btn btn-danger mt-2">Send</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const gambar = document.getElementById("gambar");
        const img = document.getElementById("blah");
        gambar.addEventListener('change',function(){
            const [file] = gambar.files;
            if ( file ){
                img.src = URL.createObjectURL(file); 
            }
        });
    </script>
@endsection
