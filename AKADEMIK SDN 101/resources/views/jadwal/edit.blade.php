@extends('layouts.backend')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('jadwal') }}">Jadwal</a></div>
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
                            <form action="/jadwal/update/{{ $edit->id }}/" method="POST" enctype="multipart/form-data"
                                class="needs-validation" novalidate="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-row mb-3">
                                        <div class="col-4 col-sm-4">
                                            <label>Kelas</label>
                                            <select name="kelas_id" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($kelas as $kls)
                                                    <option value="{{ $kls->id }}">{{ $kls->kelas }} ||
                                                        {{ $kls->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <label>Mapel</label>
                                            <select name="mapel_id" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($mapel as $mpl)
                                                    <option value="{{ $mpl->id }}">{{ $mpl->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <label>Tahun Ajaran</label>
                                            <select name="tahun_id" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($tahun as $thn)
                                                    <option value="{{ $thn->id }}">{{ $thn->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-8 col-sm-8">
                                            <label>Hari</label>
                                            <select name="hari_id" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($hari as $hr)
                                                    <option value="{{ $hr->id }}">{{ $hr->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <label>Jam</label>
                                            <input type="time" class="form-control" name="jam">
                                        </div>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-12 col-sm-12">
                                            <label>Guru</label>
                                            <select name="pegawai_id" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($guru as $gr)
                                                    <option value="{{ $gr->id }}">{{ $gr->nama }}
                                                    </option>
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
        </section>
    </div>
@endsection
