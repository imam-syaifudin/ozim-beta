@extends('dashboard.layout')

@section('main')
    <div class="container">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">Form Tambah Product</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.edit',$user->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama : </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            name="name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Username : </label>
                        <input type="text" class="form-control" id="gambar" name="username" value="{{ $user->username }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email : </label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                        value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password : ( Kosongkan jika tidak ingin diganti )</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" name="password"
                            >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Telp</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="telp"
                        value="{{ $user->telp }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="alamat"
                        value="{{ $user->alamat }}">
                    </div>


                    <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin : </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelamin" value="laki"
                        id="flexRadioDefault1" @if( $user->kelamin == 'laki') checked @endif>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Laki - laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelamin" value="perempuan"
                            id="flexRadioDefault2" @if( $user->kelamin == 'perempuan') checked @endif>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Perempuan
                        </label>
                    </div>
                      <button type="submit" class="btn btn-danger mt-2">Edit Profile</button>
                </form>
            </div>
        </div>

    </div>
@endsection
