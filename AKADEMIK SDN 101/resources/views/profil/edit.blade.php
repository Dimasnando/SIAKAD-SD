@extends('layouts.backend')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Profil</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Home</a></div>
                    <div class="breadcrumb-item">Edit Profil</div>
                </div>
            </div>
            @if (\Session::has('notif'))
                <div class="alert alert-primary" align="center">
                    {!! \Session::get('notif') !!}
                </div>
            @endif
            <!-- error -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- end error -->
            <div class="section-body">

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="/profil/{{ $profil->id }}/update" method="POST" enctype="multipart/form-data"
                                class="needs-validation" novalidate="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama</label>
                                            @if (auth()->user()->role == 'Guru')
                                                <input type="text" class="form-control"
                                                    value="{{ $profil->pegawai->nama }}" disabled>
                                            @endif
                                            @if (auth()->user()->role == 'Siswa')
                                                <input type="text" class="form-control"
                                                    value="{{ $profil->siswa->nama }}" disabled>
                                            @endif
                                            <div class="invalid-feedback">
                                                Please fill in the first name
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Username Login</label>
                                            <input type="text" class="form-control" value="{{ $profil->username }}"
                                                disabled>
                                            <div class="invalid-feedback">
                                                Please fill in the last name
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                            <div class="invalid-feedback">
                                                Please fill in the email
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
