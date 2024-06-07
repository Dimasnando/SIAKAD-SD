@extends('layouts.backend')

@section('content')

    <main>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    @if (auth()->user()->role == 'Dev')
                        <h1>Tambah Siswa</h1>
                    @endif
                    @if (auth()->user()->role == 'Guru')
                        <h1>Jadwal Mengajar</h1>
                    @endif
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home', []) }}">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="{{ url('jadwal', []) }}">Jadwal</a></div>
                        <div class="breadcrumb-item">Tambah Siswa</div>
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
                                        <table class="table-mahasiswa" width="100%">
                                            <tr>
                                                <td>Guru</td>
                                                <th> : {{ $detail->pegawai->nama ?? '' }} </th>
                                            </tr>
                                            <tr>
                                                <td>Kelas</td>
                                                <th> :
                                                    {{ $detail->kelas->kelas ?? '' }} || {{ $detail->kelas->nama ?? '' }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>Wali Kelas</td>
                                                <th> :
                                                    {{ $detail->kelas->pegawai->nama ?? '' }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>Waktu</td>
                                                <th> : {{ $detail->hari->nama ?? '' }}, {{ $detail->jam ?? '' }}</th>
                                            </tr>
                                            <tr>
                                                <td width="15%">Mata pelajaran</td>
                                                <th> : {{ $detail->mapel->nama ?? '' }}</th>
                                            </tr>
                                        </table>
                                        <a href=""data-toggle="modal" data-target="#exampleModal"
                                            class="btn btn-primary">Tambah Siswa
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th width="6%">No</th>
                                                        <th>Siswa</th>
                                                        <th>NISN</th>
                                                        <th class="text-center">Pilihan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($detail->jadwal_siswa->count() == 0)
                                                        <tr align="center">
                                                            <th colspan="4">Belum Ada Siswa !!!</th>
                                                        </tr>
                                                    @else
                                                        @foreach ($detail->jadwal_siswa as $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item->siswa->nama ?? '-' }}</td>
                                                                <td>{{ $item->siswa->nis ?? '-' }}</td>
                                                                <td nowrap align="center">
                                                                    <a href="/jadwal/delete/siswa/{{ $item->id }}/"
                                                                        class="btn btn-danger  "
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
                </div>
            </section>
        </div>

    </main>
@endsection
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

                <form action="{{ url('/jadwal/store/siswa') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="pegawai_id" value=" {{ $detail->pegawai_id }}">
                    <input type="hidden" name="jadwal_id" value=" {{ $detail->id }}">
                    <input type="hidden" name="tahun_id" value=" {{ $detail->tahun_id }}">
                    <input type="hidden" name="kelas_id" value=" {{ $detail->kelas_id }}">
                    <input type="hidden" name="mapel_id" value=" {{ $detail->mapel_id }}">
                    <div class="form-row mb-3">
                        <div class="col-12 col-sm-12">
                            <label>Nama</label>
                            <select name="siswa_id" class="form-control">
                                <option value="">-- Pilih --</option>
                                @foreach ($siswa as $sws)
                                    <option value="{{ $sws->id }}">{{ $sws->nama }}
                                    </option>
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
