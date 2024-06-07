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
                    @if (auth()->user()->role == 'Guru')
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Hari {{ $jaguru->nama }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th width="6%">No</th>
                                                        <th>Waktu</th>
                                                        <th>Kelas</th>
                                                        <th>Mapel</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($jaguru->jadwal->count() == 0)
                                                        <tr align="center">
                                                            <th colspan="4">Belum Ada Jadwal !!!</th>
                                                        </tr>
                                                    @else
                                                        @foreach ($jaguru->jadwal as $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}.</td>
                                                                <td> {{ $item->jam }}</td>
                                                                <td>{{ $item->kelas->kelas ?? '-' }} ||
                                                                    {{ $item->kelas->nama ?? '-' }}</td>
                                                                <td>{{ $item->mapel->nama ?? '-' }}</td>
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
