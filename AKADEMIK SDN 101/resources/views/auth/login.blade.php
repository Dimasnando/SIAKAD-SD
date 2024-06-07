@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="update/sd.png" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary"><br>
                        <div align="center">
                            <h4>LOGIN</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Username</label>
                                    <input id="email" type="text" tabindex="1"
                                        class="form-control {{ $errors->has('username') || $errors->has('email') ? 'is-invalid' : '' }}"
                                        name="login" value="{{ old('username') ? old('username') : old('email') }}"
                                        placeholder="Username" required="" autofocus="">
                                    @if ($errors->has('username') || $errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('username') ? $errors->first('username') : $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" tabindex="2" required=""
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        &copy; 2023 SDN 101 TANJABTIM
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
