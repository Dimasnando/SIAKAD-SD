@extends('layouts.backend')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pendaftar</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Pendaftar</div>
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
                <div class="row mt-sm-4">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Registrasi</th>
                                                <th>Nama</th>
                                                <th>Status Daftar</th>
                                                <th>Status bayar</th>
                                                <th class="text-center">Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($data->count() == 0)
                                                <tr align="center">
                                                    <th colspan="6">Belum Ada Data !!!</th>
                                                </tr>
                                            @else
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->id_registrasi }}</td>
                                                        <td>{{ $item->nama ?? '-' }}</td>
                                                        <td><a href="/pendaftar/detail/{{ $item->uuid }}/">
                                                                <span class="badge badge-info">
                                                                    <i class="fa fa-search"></i> {{ $item->status }}
                                                                </span>
                                                            </a>
                                                        </td>
                                                        <td>{{ $item->pembayaran->status ?? '- Belum Bayar -' }} </td>
                                                        <td nowrap align="center">
                                                            @if ($item['status'] == 'Verifikasi')
                                                                <a onclick="return confirm('Terima Pendaftar {{ $item->nama }}  ??')"
                                                                    class="btn btn-sm btn-primary"
                                                                    href="{{ url('pendaftar/terima/' . $item->uuid, []) }}"><i
                                                                        class="fa fa-check"></i> Terima
                                                                </a>
                                                            @else
                                                            @endif
                                                            @if ($item['status'] == 'Terima')
                                                            @else
                                                                <a onclick="return confirm('Tolak Pendaftar {{ $item->nama }} ??')"
                                                                    class="btn btn-sm btn-danger"
                                                                    href="{{ url('pendaftar/tolak/' . $item->uuid, []) }}"><i
                                                                        class="fa fa-ban"></i> Tolak
                                                                </a>
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
            </div>
        </section>
    </div>
@endsection
