@extends('layouts.backend')

@section('content')
    <main>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Nilai</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home', []) }}">Dashboard</a></div>
                        {{-- <div class="breadcrumb-item"><a href="#">Modules</a></div> --}}
                        <div class="breadcrumb-item">Nilai</div>
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
                                                        <th width="10%">Kelas</th>
                                                        <th>Mapel</th>
                                                        <th class="text-center">Pilihan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($nilai->jadwal->count() == 0)
                                                        <tr align="center">
                                                            <th colspan="4">Belum Ada Data !!!</th>
                                                        </tr>
                                                    @else
                                                        @foreach ($nilai->jadwal as $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}.</td>
                                                                <td>
                                                                    {{ $item->kelas->kelas ?? '-' }} ||
                                                                    {{ $item->kelas->nama ?? '-' }}
                                                                </td>
                                                                <td>
                                                                    {{ $item->mapel->nama ?? '-' }}
                                                                </td>
                                                                <td nowrap align="center">
                                                                    <a href="/nilai/all/siswa/{{ $item->id }}/"
                                                                        class="btn btn-primary btn-sm">
                                                                        <i class="fa fa-users"></i> Lihat Siswa
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
                    @if (auth()->user()->role == 'Siswa')
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th width="6%">No</th>
                                                        <th>Mapel</th>
                                                        <th>Harian</th>
                                                        <th>PTS</th>
                                                        <th>PAS</th>
                                                        <th>HPA</th>
                                                        <th class="text-center">Ket</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($nilaisiswa as $mapel => $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                {{ $mapel }}
                                                            </td>
                                                            @php
                                                                $harian = 0;
                                                                $pts = 0;
                                                                $pas = 0;
                                                            @endphp
                                                            @foreach ($data as $v)
                                                                <td>{{ $v->nilai }}</td>
                                                                {{-- <td>ket</td> --}}
                                                                @php
                                                                    $harian += $v->nilai;
                                                                    $pts += $v->nilai;
                                                                    $pas += $v->nilai;
                                                                @endphp
                                                            @endforeach
                                                            <td>
                                                                @if ($cek < 1)
                                                                    {{ $harian / 1 }}
                                                                @else
                                                                    {{ Str::substr($harian / 3, 0, 5) }}
                                                                @endif
                                                            </td>
                                                            <td align="center">
                                                                @if ($harian / 3 > '60')
                                                                    <span
                                                                        class="badge badge-pill badge-primary">Tuntas</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Tidak
                                                                        Tuntas</span>
                                                                @endif
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
                    @endif
                </div>
            </section>
        </div>

    </main>
@endsection
