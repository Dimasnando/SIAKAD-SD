@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3  ">
                    <div class="login-brand">
                        <img src="update/img/sma.png" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>
                    <div class="card card-primary"><br>
                        <div align="center">
                            <h4>Registrasi Akun</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 col-6">
                                        <label for="email">Nama</label>
                                        <input id="name" type="text" tabindex="1"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-6">
                                        <label for="email">Username</label>
                                        <input id="name" type="text" tabindex="2"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-6">
                                        <label for="email">Password</label>
                                        <input id="password" type="password" tabindex="3"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-6">
                                        <label for="email">Konfirmasi Password</label>
                                        <input id="password-confirm" type="password" class="form-control" tabindex="4"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Buat Akun
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        &copy; 2023 SMA N 10 Muaro Jambi
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
