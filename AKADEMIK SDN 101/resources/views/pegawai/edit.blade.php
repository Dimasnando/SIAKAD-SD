@extends('layouts.backend')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit {{ $edit->nama }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('pegawai') }}">Guru</a></div>
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
                            <form action="/pegawai/update/{{ $edit->uuid }}/" method="POST" enctype="multipart/form-data"
                                class="needs-validation" novalidate="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ $edit->nama }}" placeholder="Nama Pegawai">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>NIP</label>
                                            <input type="text" name="nip" class="form-control"
                                                value="{{ $edit->nip }}" placeholder="NIP Pegawai">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Jabatan</label>
                                            <select name="jabatan" class="form-control" required="">
                                                <option value="Kepsek" @if ($edit->jabatan == 'Kepsek') selected @endif>
                                                    Kepsek</option>
                                                <option value="Guru" @if ($edit->jabatan == 'Guru') selected @endif>
                                                    Guru</option>
                                                <option value="Staff" @if ($edit->jabatan == 'Staff') selected @endif>
                                                    Staff</option>
                                            </select>
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
