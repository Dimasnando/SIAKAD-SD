@extends('layouts.backend')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit {{ $edit->kelas }} {{ $edit->nama }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('kelas') }}">Kelas</a></div>
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
                            <form action="/kelas/update/{{ $edit->id }}/" method="POST" enctype="multipart/form-data"
                                class="needs-validation" novalidate="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 col-sm-8">
                                            <label>Kelas</label>
                                            <select name="kelas" class="form-control">
                                                <option value="1" @if ($edit->kelas == '1') selected @endif>
                                                    1
                                                </option>
                                                <option value="2" @if ($edit->kelas == '2') selected @endif>
                                                    2
                                                </option>
                                                <option value="3" @if ($edit->kelas == '3') selected @endif>
                                                    3
                                                </option>
                                                <option value="4" @if ($edit->kelas == '4') selected @endif>
                                                    4
                                                </option>
                                                <option value="5" @if ($edit->kelas == '5') selected @endif>
                                                    5
                                                </option>
                                                <option value="6" @if ($edit->kelas == '6') selected @endif>
                                                    6
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <label>Nama</label>
                                            <select name="nama" class="form-control">
                                                <option value="" selected disabled>-- Pilih --</option>
                                                <option value="A" @if ($edit->nama == 'A') selected @endif>
                                                    A
                                                </option>
                                                <option value="B" @if ($edit->nama == 'B') selected @endif>
                                                    B
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-8 col-sm-8">
                                            <label>Wali Kelas</label>
                                            <select name="pegawai_id" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($wali as $wl)
                                                    <option value="{{ $wl->id }}">
                                                        {{ $wl->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <label>Tahun Ajaran</label>
                                            <select name="tahun_id" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($tahun as $thn)
                                                    <option value="{{ $thn->id }}"> {{ $thn->nama }} </option>
                                                @endforeach
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
