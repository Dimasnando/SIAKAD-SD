@extends('layouts.backend')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit {{ $edit->nama }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('siswa') }}">Siswa</a></div>
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
                            <form action="/siswa/update/{{ $edit->uuid }}/" method="POST" enctype="multipart/form-data"
                                class="needs-validation" novalidate="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-12 col-sm-12">
                                            <label class="small mb-1" for="inputEmailAddress">Nama</label>
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="Masukan Nama Siswa" value="{{ $edit->nama }}">
                                        </div>
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="col-4 col-sm-4">
                                            <label class="small mb-1" for="inputEmailAddress">Tempat Lahir</label>
                                            <input type="text" name="tempat" class="form-control"
                                                placeholder="Masukan Tempat Lahir" value="{{ $edit->tempat }}">
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <label class="small mb-1" for="inputEmailAddress">Tanggal</label>
                                            <input type="date" name="ttl" class="form-control"
                                                value="{{ $edit->ttl }}">
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <label class="small mb-1" for="inputEmailAddress">Jenis Kelamin</label>
                                            <select name="jk" class="form-control" required="">
                                                <option value="Laki-Laki" @if ($edit->jk == 'Laki-Laki') selected @endif>
                                                    Laki-Laki</option>
                                                <option value="Perempuan" @if ($edit->jk == 'Perempuan') selected @endif>
                                                    Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="col-6 col-sm-6">
                                            <label class="small mb-1" for="inputEmailAddress">NIS</label>
                                            <input type="number" name="nis" class="form-control"
                                                placeholder="Masukan Tempat Lahir" value="{{ $edit->nis }}">
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <label class="small mb-1" for="inputEmailAddress">NoHp</label>
                                            <input type="number" name="hp" class="form-control"
                                                placeholder="Masukan Tempat Lahir" value="{{ $edit->hp }}">
                                        </div>
                                    </div>
                                    <div class="form-row mt-3 mb-4">
                                        <div class="col-12 col-sm-12">
                                            <label class="small mb-1" for="inputEmailAddress">Alamat</label>
                                            <textarea name="alamat" id="" cols="30" rows="3" class="form-control">{{ $edit->alamat }}</textarea>
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
