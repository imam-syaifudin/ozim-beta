@extends('dashboard.layout')

@section('main')
    <div class="container">
        <div class="card shadow-sm mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger text-center">Profile</h6>
            </div>
            <div class="card-body p-5">
                <div class="row">
                    <div class="col-lg-6">
                        <img class="img-profile rounded-circle img-thumbnail shadow"
                                    src="{{ asset('sbadmin/img/undraw_profile.svg') }}" width="400" height="400">
                    </div>
                    <div class="col-lg-6 mt-4 text-center   ">
                        <h5>Nama : {{ auth()->user()->name }}</h5>
                        <hr>
                        <h5>User Name : {{ auth()->user()->username }}</h5>
                        <hr>
                        <h5>Email : {{ auth()->user()->email }}</h5>
                        <hr>
                        <h5>Kelamin : {{ auth()->user()->kelamin }}</h5>
                        <hr>
                        <h5>Telpon : {{ auth()->user()->telp }}</h5>
                        <hr>
                        <h5>Alamat : {{ auth()->user()->alamat }}</h5>
                        <hr>
                        <h5>Role : {{ auth()->user()->role }}</h5>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <a href="{{ route('profile',auth()->user()->id) }}" class="btn btn-outline-success d-block">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
