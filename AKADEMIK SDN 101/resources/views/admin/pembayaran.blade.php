@extends('layouts.backend')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pembayaran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Pembayaran</div>
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
                                                <th>Pendaftar</th>
                                                <th>Bukti, Pengirim</th>
                                                <th>Status bayar</th>
                                                <th class="text-center">Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($bayar->count() == 0)
                                                <tr align="center">
                                                    <th colspan="6">Belum Ada Data !!!</th>
                                                </tr>
                                            @else
                                                @foreach ($bayar as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->pendaftar->id_registrasi }}</td>
                                                        <td>{{ $item->pendaftar->nama ?? '-' }}</td>
                                                        <td class="text-capitalize">
                                                            <a href="{{ url('/bukti_bayar/' . $item->bukti ?? '--') }}"
                                                                target="_blank">
                                                                <span class="badge badge-info">
                                                                    <i class="fa fa-file-image"></i>
                                                                    {{ $item->pemilik ?? '-' }}
                                                                </span>
                                                            </a>
                                                        </td>
                                                        <td>{{ $item->status }} </td>
                                                        <td nowrap align="center">
                                                            @if ($item['status'] == 'Verifikasi')
                                                                <a onclick="return confirm('Terima Pembayaran {{ $item->nama }}  ??')"
                                                                    class="btn btn-sm btn-primary"
                                                                    href="{{ url('pembayaran/terima/' . $item->uuid, []) }}"><i
                                                                        class="fa fa-check"></i> Terima
                                                                </a>
                                                            @else
                                                            @endif
                                                            @if ($item['status'] == 'Terima')
                                                            @else
                                                                <a onclick="return confirm('Tolak Pembayaran {{ $item->nama }} ??')"
                                                                    class="btn btn-sm btn-danger"
                                                                    href="{{ url('pembayaran/tolak/' . $item->uuid, []) }}"><i
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
