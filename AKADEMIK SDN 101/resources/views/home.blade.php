@extends('layouts.backend')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
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
            @if (auth()->user()->role == 'Dev')
                {{-- jumlah --}}
                <div class="row">
                    {{-- spt --}}
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ url('jadwal', []) }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Jadwal Pelajaran</h4>
                                    </div>
                                    <div class="card-body">
                                        {!! json_encode($jadwal) !!}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Akun --}}
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ url('informasi', []) }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Informasi</h4>
                                    </div>
                                    <div class="card-body">
                                        {!! json_encode($info) !!}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- ASN --}}
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ url('pegawai', []) }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Guru</h4>
                                    </div>
                                    <div class="card-body">
                                        {!! json_encode($pegawai) !!}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- ptt --}}
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ url('siswa', []) }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Siswa</h4>
                                    </div>
                                    <div class="card-body">
                                        {!! json_encode($siswa) !!}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- end atas --}}
            @endif
            @if (auth()->user()->role == 'Siswa')
                {{-- star --}}
                <div class="section-body">
                    @foreach ($profil as $item)
                        <h2 class="section-title">Hi, {{ $item->siswa->nama }}</h2>
                    @endforeach
                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-5">
                            <div class="card profile-widget">
                                <div class="profile-widget-header">
                                    <img alt="image" src="{{ asset('update') }}/img/avatar-1.png"
                                        class="rounded-circle profile-widget-picture">
                                    <div class="profile-widget-items">
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Informasi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-widget-description">
                                    <div class="profile-widget-name">Nama
                                        <div class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div>
                                            {{ $item->siswa->nama }}
                                        </div>
                                    </div>
                                    <div class="profile-widget-name">NISN
                                        <div class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div>
                                            {{ $item->siswa->nis }}
                                        </div>
                                    </div>
                                    <hr style="width:80%">
                                    <div class="profile-widget-name">Username Login anda
                                        <div class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div>
                                            {{ $item->username }}
                                        </div>
                                    </div>
                                    <div class="profile-widget-name">Password Login anda
                                        <div class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div>
                                            ******
                                            <div class="slash"></div>
                                            <a href="profil/{{ $item->uuid }}" style="color: darkorange"><i
                                                    class="fa fa-edit"></i>
                                                Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end atas --}}
            @endif
            @if (auth()->user()->role == 'Guru')
                {{-- star --}}
                <div class="section-body">
                    @foreach ($profil as $item)
                        @if (auth()->user()->role == 'Guru')
                            <h2 class="section-title">Hi, {{ $item->pegawai->nama }}</h2>
                        @endif
                    @endforeach
                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-5">
                            <div class="card profile-widget">
                                <div class="profile-widget-header">
                                    <img alt="image" src="{{ asset('update') }}/img/avatar-1.png"
                                        class="rounded-circle profile-widget-picture">
                                    <div class="profile-widget-items">
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Informasi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-widget-description">
                                    <div class="profile-widget-name">Jabatan
                                        <div class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div>
                                            {{ $item->pegawai->jabatan }}
                                        </div>
                                    </div>
                                    <div class="profile-widget-name">Nama
                                        <div class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div>
                                            {{ $item->pegawai->nama }}
                                        </div>
                                    </div>
                                    <div class="profile-widget-name">NIP
                                        <div class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div>
                                            {{ $item->pegawai->nip }}
                                        </div>
                                    </div>
                                    <hr style="width:80%">
                                    <div class="profile-widget-name">Username Login anda
                                        <div class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div>
                                            {{ $item->username }}
                                        </div>
                                    </div>
                                    <div class="profile-widget-name">Password Login anda
                                        <div class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div>
                                            ******
                                            <div class="slash"></div>
                                            <a href="profil/{{ $item->uuid }}" style="color: darkorange"><i
                                                    class="fa fa-edit"></i>
                                                Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end atas --}}
            @endif
        </section>
    </div>
@endsection
