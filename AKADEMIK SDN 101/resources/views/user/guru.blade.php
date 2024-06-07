@extends('layouts.backend')

@section('content')

    <main>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>User Guru</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home', []) }}">Dashboard</a></div>
                        {{-- <div class="breadcrumb-item"><a href="#">Modules</a></div> --}}
                        <div class="breadcrumb-item">User Guru</div>
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
                                                    <th>Username</th>
                                                    <th class="text-center">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($aguru->count() == 0)
                                                    <tr align="center">
                                                        <th colspan="4">Belum Ada Data !!!</th>
                                                    </tr>
                                                @else
                                                    @foreach ($aguru as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->pegawai->nama }}</td>
                                                            <th>{{ $item->username }}</th>
                                                            <td nowrap align="center">
                                                                <a href="/user/delete/{{ $item->uuid }}/"
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ url('/user/store/guru') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="role" value="Guru">
                        <div class="form-row">
                            <div class="col-12 col-sm-12">
                                <label class="small mb-1" for="inputEmailAddress">Nama</label>
                                <select name="pegawai_id" class="form-control" required="">
                                    <option value="" selected disabled>-- Pilih -- </option>
                                    @foreach ($guru as $gr)
                                        <option value="{{ $gr->id }}">{{ $gr->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row mt-3 mb-3">
                            <div class="col-6 col-sm-6">
                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username Login">
                            </div>
                            <div class="col-6 col-sm-6">
                                <label class="small mb-1" for="inputEmailAddress">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan Password">
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
