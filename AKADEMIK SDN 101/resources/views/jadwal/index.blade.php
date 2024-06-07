@extends('layouts.backend')

@section('content')

    <main>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    @if (auth()->user()->role == 'Dev')
                        <h1>Jadwal</h1>
                    @endif
                    @if (auth()->user()->role == 'Guru')
                        <h1>Jadwal Mengajar</h1>
                    @endif
                    @if (auth()->user()->role == 'Siswa')
                        <h1>Jadwal Belajar</h1>
                    @endif
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home', []) }}">Dashboard</a></div>
                        {{-- <div class="breadcrumb-item"><a href="#">Modules</a></div> --}}
                        <div class="breadcrumb-item">Jadwal</div>
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
                    @if (auth()->user()->role == 'Dev')
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
                                                        <th>Waktu</th>
                                                        <th>kelas</th>
                                                        <th>Mapel</th>
                                                        <th>Guru</th>
                                                        <th class="text-center">Pilihan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($jadwal->count() == 0)
                                                        <tr align="center">
                                                            <th colspan="7">Belum Ada Data !!!</th>
                                                        </tr>
                                                    @else
                                                        @foreach ($jadwal as $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item->hari->nama ?? '-' }}, {{ $item->jam }}</td>
                                                                <td>{{ $item->kelas->kelas ?? '-' }} ||
                                                                    {{ $item->kelas->nama ?? '-' }}</td>
                                                                <td>{{ $item->mapel->nama ?? '-' }}</td>
                                                                <td>{{ $item->pegawai->nama ?? '-' }}</td>
                                                                <td nowrap align="center">
                                                                    <a href="/jadwal/detail/{{ $item->id }}/"
                                                                        class="btn btn-primary btn-sm">
                                                                        <i class="fa fa-plus-circle"> </i>
                                                                    </a>
                                                                    <a href="/jadwal/edit/{{ $item->id }}/"
                                                                        class="btn btn-warning btn-sm">
                                                                        <i class="fa fa-edit"> </i>
                                                                    </a>
                                                                    <a href="/jadwal/delete/{{ $item->id }}/"
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
                    @endif
                    @if (auth()->user()->role == 'Guru')
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th width="6%">No</th>
                                                        <th>Hari</th>
                                                        <th class="text-center">Pilihan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($jaguru->count() == 0)
                                                        <tr align="center">
                                                            <th colspan="2">Belum Ada Data !!!</th>
                                                        </tr>
                                                    @else
                                                        @foreach ($jaguru as $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}.</td>
                                                                <td>{{ $item->nama ?? '-' }}</td>
                                                                <td nowrap align="center">
                                                                    @if ($item->jadwal->count('pivot.hari_id'))
                                                                        <a href="/jadwal/detail/ngajar/{{ $item->id }}/"
                                                                            class="btn btn-primary btn-sm">
                                                                            <i class="fa fa-search"></i> Lihat Jadwal
                                                                        </a>
                                                                    @else
                                                                        <b style="color:red">- Tidak Ada Jadwal -</b>
                                                                    @endif
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
                    @endif
                    @if (auth()->user()->role == 'Siswa')
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <table class="table-mahasiswa" width="100%" id="trskrp">
                                            <tr>
                                                <td width="15%">Nama</td>
                                                <th> : {{ Auth::user()->siswa->nama }}</th>
                                            </tr>
                                            <tr>
                                                <td>NISN</td>
                                                <th> : {{ Auth::user()->siswa->nis }}</th>
                                            </tr>
                                        </table>
                                        {{-- <a href="" data-toggle="modal" data-target="#import" class="btn btn-warning">Import</a> --}}
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th width="6%">No</th>
                                                        <th>Waktu</th>
                                                        {{-- <th>kelas</th> --}}
                                                        <th>Mata Pelajaran</th>
                                                        <th>Guru</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($jasiswa->count() == 0)
                                                        <tr align="center">
                                                            <th colspan="6">Belum Ada Data !!!</th>
                                                        </tr>
                                                    @else
                                                        @foreach ($jasiswa as $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item->jadwal->hari->nama ?? '-' }},
                                                                    {{ $item->jadwal->jam }}
                                                                </td>
                                                                {{-- <td>{{ $item->kelas->kelas ?? '-' }} ||
                                                                    {{ $item->kelas->nama ?? '-' }}</td> --}}
                                                                <td>{{ $item->jadwal->mapel->nama ?? '-' }}</td>
                                                                <td>{{ $item->pegawai->nama ?? '-' }}</td>
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
                    @endif
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

                    <form action="{{ url('/jadwal/store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row mb-3">
                            <div class="col-4 col-sm-4">
                                <label>Kelas</label>
                                <select name="kelas_id" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($kelas as $kls)
                                        <option value="{{ $kls->id }}">{{ $kls->kelas }} || {{ $kls->nama }}
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
                            {{-- <div class="col-6 col-sm-6">
                                <label>Siswa</label>
                                <select name="siswa_id" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($siswa as $sws)
                                        <option value="{{ $sws->id }}">{{ $sws->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}
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
