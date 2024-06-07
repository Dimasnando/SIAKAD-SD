@extends('layouts.backend')

@section('content')

    <main>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Kelas</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home', []) }}">Dashboard</a></div>
                        {{-- <div class="breadcrumb-item"><a href="#">Modules</a></div> --}}
                        <div class="breadcrumb-item">Kelas</div>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="" data-toggle="modal" data-target="#exampleModal"
                                        class="btn btn-primary">Tambah</a>
                                    {{-- <a href="" data-toggle="modal" data-target="#import" class="btn btn-warning">Import</a> --}}
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th width="6%">No</th>
                                                    <th>kelas</th>
                                                    <th>Nama</th>
                                                    <th>Wali Kelas</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th class="text-center">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($kls->count() == 0)
                                                    <tr align="center">
                                                        <th colspan="4">Belum Ada Data !!!</th>
                                                    </tr>
                                                @else
                                                    @foreach ($kls as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->kelas }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->pegawai->nama ?? '' }}</td>
                                                            <td>{{ $item->tahun->nama ?? '' }}</td>
                                                            <td nowrap align="center">
                                                                <a href="/kelas/edit/{{ $item->id }}/"
                                                                    class="btn btn-warning btn-sm">
                                                                    <i class="fa fa-edit"> </i>
                                                                </a>
                                                                <a href="/kelas/delete/{{ $item->id }}/"
                                                                    class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Anda yakin ingin menghapus ?')">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main>
    <!-- Modal tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ url('/kelas/store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row mb-3">
                            <div class="col-8 col-sm-8">
                                <label>Kelas</label>
                                <select name="kelas" class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="col-4 col-sm-4">
                                <label>Nama</label>
                                <select name="nama" class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-3">
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
                        <div class="form-group d-flex align-items-center justify-content-between mb-0">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- stop modal --}}
@endsection
