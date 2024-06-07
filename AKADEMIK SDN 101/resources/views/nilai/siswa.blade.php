@extends('layouts.backend')

@section('content')

    <main>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Tambah Nilai Siswa </h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home', []) }}">Dashboard</a></div>
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
                                    <table class="table-mahasiswa" width="100%">
                                        <tr>
                                            <td width="15%">Nama </td>
                                            <th> : {{ $nilai->siswa->nama }} </th>
                                        </tr>
                                        <tr>
                                            <td width="15%">NISN</td>
                                            <th> : {{ $nilai->siswa->nis }} </th>
                                        </tr>
                                        <tr>
                                            <td width="15%">Kelas</td>
                                            <th> : {{ $nilai->kelas->kelas }} || {{ $nilai->kelas->nama }}</th>
                                        </tr>
                                        <tr>
                                            <td width="15%">Mapel</td>
                                            <th> : {{ $nilai->mapel->nama }} </th>
                                        </tr>
                                    </table>
                                    <a href=""data-toggle="modal" data-target="#exampleModal"
                                        class="btn btn-primary">Tambah Nilai
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th width="6%">No</th>
                                                    <th>Jenis Nilai</th>
                                                    <th>Nilai</th>
                                                    <th>Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $harian = 0;
                                                    $pts = 0;
                                                    $pas = 0;
                                                @endphp
                                                @foreach ($nilai->nilai as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}.</td>
                                                        <td>
                                                            @if ($item['jenis'] == 'pts')
                                                                PTS (Penilaian Tengah Semester)
                                                            @elseif ($item['jenis'] == 'pas')
                                                                PAS (Penilaian Akhir Semester)
                                                            @else
                                                                Harian
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->nilai }}</td>
                                                        <td nowrap>
                                                            <a href="/nilai/edit/{{ $item->uuid }}/"
                                                                class="btn btn-warning btn-sm">
                                                                <i class="fa fa-edit"> </i>
                                                            </a>
                                                            <a href="/nilai/delete/{{ $item->uuid }}/"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Anda yakin ingin menghapus ?')">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $harian += $item->nilai;
                                                        $pts += $item->nilai;
                                                        $pas += $item->nilai;
                                                    @endphp
                                                @endforeach
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2" style="color: rgb(33, 98, 236)" class="text-center">
                                                        Rata - Rata
                                                    </th>
                                                    <th>
                                                        <span class="badge badge-pill badge-info">
                                                            @if ($cek < 1)
                                                                {{ $harian / 1 }}
                                                            @else
                                                                {{ Str::substr($harian / $count, 0, 5) }}
                                                            @endif
                                                        </span>
                                                        ||
                                                        @if ($harian / 3 > '60')
                                                            <span class="badge badge-pill badge-primary">Tuntas</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger">Tidak Tuntas</span>
                                                        @endif
                                                    </th>
                                                </tr>
                                            </tfoot>
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
@endsection

<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/nilai/store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="pegawai_id" value=" {{ $nilai->pegawai_id }}">
                    <input type="hidden" name="jadwal_id" value=" {{ $nilai->jadwal_id }}">
                    <input type="hidden" name="jadwal_siswa_id" value=" {{ $nilai->id }}">
                    <input type="hidden" name="tahun_id" value=" {{ $nilai->tahun_id }}">
                    <input type="hidden" name="kelas_id" value=" {{ $nilai->kelas_id }}">
                    <input type="hidden" name="mapel_id" value=" {{ $nilai->mapel_id }}">
                    <input type="hidden" name="siswa_id" value=" {{ $nilai->siswa_id }}">
                    <div class="form-row">
                        <div class="col-6 col-sm-6">
                           <label>Jenis Nilai</label>
                            <select name="jenis" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="harian">Harian</option>
                                <option value="pts">PTS (Penilaian Tengah Semester)</option>
                                <option value="pas">PAS (Penilaian Akhir Semester)</option>
                            </select>
                        </div>
                        <div class="col-6 col-sm-6">
                            <label>Nilai</label>
                            <input type="text" class="form-control" name="nilai">
                        </div>
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
