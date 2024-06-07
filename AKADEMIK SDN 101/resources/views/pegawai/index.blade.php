@extends('layouts.backend')

@section('content')

    <main>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Guru</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home', []) }}">Dashboard</a></div>
                        {{-- <div class="breadcrumb-item"><a href="#">Modules</a></div> --}}
                        <div class="breadcrumb-item">Guru</div>
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
                                                    <th>Nama</th>
                                                    <th>NIP</th>
                                                    <th>Jabatan</th>
                                                    <th class="text-center">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($pegawai->count() == 0)
                                                    <tr align="center">
                                                        <th colspan="5">Belum Ada Pegawai !!!</th>
                                                    </tr>
                                                @else
                                                    @foreach ($pegawai as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->nip ?? '-' }}</td>
                                                            <td>{{ $item->jabatan ?? '-' }}</td>
                                                            <td nowrap align="center">
                                                                <a href="/pegawai/edit/{{ $item->uuid }}/"
                                                                    class="btn btn-warning btn-sm">
                                                                    <i class="fa fa-edit"> </i>
                                                                </a>
                                                                <a href="/pegawai/delete/{{ $item->uuid }}/"
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ url('/pegawai/store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Pegawai">
                        </div>
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" class="form-control" name="nip" placeholder="No Induk Pegawai">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select name="jabatan" class="form-control" required="">
                                <option value="" selected disabled>--
                                    Pilih --
                                </option>
                                <option value="Kepsek">Kepsek</option>
                                <option value="Guru">Guru</option>
                                <option value="Staff">Staff</option>
                            </select>
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
