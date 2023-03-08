@extends('home.layout')

@section('main')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url('https://p4.wallpaperbetter.com/wallpaper/241/472/56/betta-fighting-fish-psychedelic-wallpaper-preview.jpg'); background-size: cover;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Halaman Register!</h1>
                                    </div>
                                    <form method="POST" class="user" action="{{ url('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Nama Lengkap" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Telp" name="telp">
                                        </div>
                                        <div class="form-group">
                                            <input type="alamat" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Alamat" name="alamat">
                                        </div>
                                        <label for="">Jenis Kelamin : </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kelamin" value="laki" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                              Laki - Laki
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kelamin" value="perempuan" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                              Perempuan
                                            </label>
                                          </div>

                                        <button type="submit" class="btn btn-danger btn-user btn-block">
                                            register
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="fs-3 text-danger" href="{{ url('/login') }}">Login Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
