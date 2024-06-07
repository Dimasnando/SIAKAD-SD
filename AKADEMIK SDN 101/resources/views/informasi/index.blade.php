@extends('layouts.backend')

@section('content')

    <main>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Informasi</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home', []) }}">Dashboard</a></div>
                        {{-- <div class="breadcrumb-item"><a href="#">Modules</a></div> --}}
                        <div class="breadcrumb-item">Informasi</div>
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
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th width="6%">No</th>
                                                    <th>Foto</th>
                                                    <th>Isi</th>
                                                    <th class="text-center">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($info->count() == 0)
                                                    <tr align="center">
                                                        <th colspan="4">Belum Ada Data !!!</th>
                                                    </tr>
                                                @else
                                                    @foreach ($info as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                <a href="{{ url('/informasi_foto/' . $item->foto) }}"
                                                                    target="_blank"><i class="fa fa-file-image"
                                                                        aria-hidden="true"></i> Lihat
                                                                </a>
                                                            </td>
                                                            <td>{{ $item->isi }}</td>
                                                            <td nowrap align="center">
                                                                <a href="/informasi/edit/{{ $item->id }}/"
                                                                    class="btn btn-warning btn-sm">
                                                                    <i class="fa fa-edit"> </i>
                                                                </a>
                                                                <a href="/informasi/delete/{{ $item->id }}/"
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ url('/informasi/store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                        <div class="form-group mt-3">
                            <label>Isi</label>
                            <textarea name="isi" id="" cols="2" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-3 mb-0">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- stop modal --}}
@endsection
