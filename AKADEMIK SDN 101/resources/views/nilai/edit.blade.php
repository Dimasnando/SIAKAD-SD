@extends('layouts.backend')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Nilai {{ $edit->siswa->nama }}</h1>
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
                            <form action="/nilai/update/{{ $edit->uuid }}/" method="POST" enctype="multipart/form-data"
                                class="needs-validation" novalidate="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-6 col-sm-6">
                                            <label>Siswa</label>
                                            <input type="text" class="form-control" name="siswa_id"
                                                value="{{ $edit->siswa->nama }}" disabled>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <label>NISN</label>
                                            <input type="text" class="form-control" name="siswa_id"
                                                value="{{ $edit->siswa->nis }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="col-6 col-sm-6">
                                            <label>Kelas</label>
                                            <input type="text" class="form-control" name="siswa_id"
                                                value="{{ $edit->kelas->kelas }} || {{ $edit->kelas->nama }}" disabled>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <label>Mapel</label>
                                            <input type="text" class="form-control" name="siswa_id"
                                                value="{{ $edit->mapel->nama }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="col-6 col-sm-6">
                                            <label>Jenis Nilai</label>
                                            <input type="text" class="form-control" name="siswa_id"
                                                value="{{ $edit->jenis }}" disabled>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <label>Nilai</label>
                                            <input type="text" class="form-control" name="nilai"
                                                value="{{ $edit->nilai }}">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-3 mb-0">
                                        <input type="submit" class="btn btn-warning" value="Update">
                                    </div>
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
