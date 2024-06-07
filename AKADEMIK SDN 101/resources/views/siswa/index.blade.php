@extends('layouts.backend')

@section('content')

    <main>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Siswa</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home', []) }}">Dashboard</a></div>
                        {{-- <div class="breadcrumb-item"><a href="#">Modules</a></div> --}}
                        <div class="breadcrumb-item">Siswa</div>
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
                                                    <th>TTL</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>NIS</th>
                                                    <th>No Hp</th>
                                                    <th>Alamat</th>
                                                    <th class="text-center">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($siswa->count() == 0)
                                                    <tr align="center">
                                                        <th colspan="8">Belum Ada Siswa !!!</th>
                                                    </tr>
                                                @else
                                                    @foreach ($siswa as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->tempat }},
                                                                <?= Date('d-m-Y', strtotime($item->ttl ?? '')) ?>
                                                            </td>
                                                            <td>{{ $item->jk ?? '-' }}</td>
                                                            <td>{{ $item->nis ?? '-' }}</td>
                                                            <td>{{ $item->hp ?? '-' }}</td>
                                                            <td>{{ $item->alamat ?? '-' }}</td>
                                                            <td nowrap align="center">
                                                                <a href="/siswa/edit/{{ $item->uuid }}/"
                                                                    class="btn btn-warning btn-sm">
                                                                    <i class="fa fa-edit"> </i>
                                                                </a>
                                                                <a href="/siswa/delete/{{ $item->uuid }}/"
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ url('/siswa/store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-12 col-sm-12">
                                <label class="small mb-1" for="inputEmailAddress">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Siswa">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-4 col-sm-4">
                                <label class="small mb-1" for="inputEmailAddress">Tempat Lahir</label>
                                <input type="text" name="tempat" class="form-control"
                                    placeholder="Masukan Tempat Lahir">
                            </div>
                            <div class="col-4 col-sm-4">
                                <label class="small mb-1" for="inputEmailAddress">Tanggal</label>
                                <input type="date" name="ttl" class="form-control">
                            </div>
                            <div class="col-4 col-sm-4">
                                <label class="small mb-1" for="inputEmailAddress">Jenis Kelamin</label>
                                <select name="jk" class="form-control" required="">
                                    <option value="" selected disabled>--
                                        Pilih --
                                    </option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-6 col-sm-6">
                                <label class="small mb-1" for="inputEmailAddress">NIS</label>
                                <input type="number" name="nis" class="form-control">
                            </div>
                            <div class="col-6 col-sm-6">
                                <label class="small mb-1" for="inputEmailAddress">No HP</label>
                                <input type="number" name="hp" class="form-control">
                            </div>
                        </div>
                        <div class="form-row mt-3 mb-4">
                            <div class="col-12 col-sm-12">
                                <label class="small mb-1" for="inputEmailAddress">Alamat</label>
                                <textarea name="alamat" id="" cols="30" rows="3" class="form-control"></textarea>
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
