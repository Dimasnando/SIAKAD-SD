@extends('layouts.backend')

@section('content')

    <main>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Data Siswa</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home', []) }}">Dashboard</a></div>
                        <div class="breadcrumb-item">Data Siswa</div>
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
                                            <td width="15%">Kelas</td>
                                            <th> : {{ $detail->kelas->kelas }} || {{ $detail->kelas->nama }}</th>
                                        </tr>
                                        <tr>
                                            <td width="15%">Mapel</td>
                                            <th> : {{ $detail->mapel->nama }} </th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th width="6%">No</th>
                                                    <th>Siswa</th>
                                                    <th>NISN</th>
                                                    <th>Tambah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detail->jadwal_siswa as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->siswa->nama ?? '' }}</td>
                                                        <td>{{ $item->siswa->nis ?? '' }}</td>
                                                        <td>
                                                            <a href="/nilai/siswa/{{ $item->id }}/"
                                                                class="btn btn-primary btn-sm">
                                                                <i class="fa fa-plus-circle"></i> Nilai
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
