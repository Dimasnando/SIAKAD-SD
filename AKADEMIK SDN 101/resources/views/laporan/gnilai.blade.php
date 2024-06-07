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
                        <a href="{{ url('pendaftar', []) }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Pendaftar</h4>
                                    </div>
                                    <div class="card-body">
                                        {!! json_encode($daftar) !!}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Akun --}}
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ url('pembayaran', []) }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="far fa-file"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Pembayaran</h4>
                                    </div>
                                    <div class="card-body">
                                        {!! json_encode($bayar) !!}
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
                                        <h4>Pegawai</h4>
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
                {{-- grafik --}}
                {{-- <div class="row">
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <div id="grafik">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- grafik --}}
                <div class="row">
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">


                                    <div id="container">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (auth()->user()->role == 'Calon')
                @if ($kosong < 1)
                    <div class="row justify-content-center">
                        {{-- Data --}}
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="card-body box-profile">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <label class="form-label" style="text-align: center">
                                        <span class="badge border-dark border-1 text-dark">
                                            <i style="color: rgb(245, 39, 24)"><b>Note : Data Anda Masih Kosong</b></i>
                                        </span>
                                    </label>
                                    <div align="center">
                                        <a href="{{ url('biodata', []) }}">
                                            <button type="button" class="btn btn-lg btn-danger">
                                                Lengkapi Biodata Anda
                                            </button>
                                        </a>
                                    </div>

                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center">
                        {{-- Data --}}
                        @foreach ($data as $item)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="card-body box-profile">
                                    <h3 class="profile-username text-center text-uppercase">{{ $item->nama }}</h3>
                                    <h5 class="profile-username text-center"><i>{{ $item->id_registrasi }}</i></h5>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item"><b>Status Pendaftaran</b>
                                            @if ($item['status'] == 'Verifikasi')
                                                <a class="float-right"><span class="badge badge-warning"
                                                        style="font-size:18px">{{ $item->status }}</a>
                                            @elseif($item['status'] == 'Terima')
                                                <a class="float-right"><span class="badge badge-info"
                                                        style="font-size:18px">{{ $item->status }}</a>
                                            @else
                                                <a class="float-right"><span class="badge badge-danger"
                                                        style="font-size:18px">{{ $item->status }}</a>
                                            @endif
                                        </li>
                                        <li class="list-group-item"><b>Status Pembayaran</b>
                                            @if ($item->pembayaran['status'] == 'Verifikasi')
                                                <a class="float-right"><span class="badge badge-warning"
                                                        style="font-size:18px">
                                                        {{ Auth::user()->pembayaran->status ?? '- Belum Konfirmasi Pembayaran -' }}</a>
                                            @elseif($item->pembayaran['status'] == 'Terima')
                                                <a class="float-right"><span class="badge badge-info"
                                                        style="font-size:18px">{{ Auth::user()->pembayaran->status ?? '- Belum Konfirmasi Pembayaran -' }}</a>
                                            @else
                                                <a class="float-right"><span class="badge badge-danger"
                                                        style="font-size:18px">{{ Auth::user()->pembayaran->status ?? '- Belum Konfirmasi Pembayaran -' }}</a>
                                            @endif
                                        </li>
                                        <li class="list-group-item"><b>Tempat, Tanggal lahir</b>
                                            <a class="float-right text-capitalize">{{ $item->tempat }},
                                                <?= Date('d-m-Y', strtotime($item->ttl ?? '')) ?></a>
                                        </li>
                                        <li class="list-group-item"><b>Jenis Kelamin</b>
                                            <a class="float-right">{{ $item->jk }}</a>
                                        </li>
                                        <li class="list-group-item"><b>Orang Tua</b>
                                            <a class="float-right">{{ $item->ayah }}<b></b></a>
                                        </li>
                                        <li class="list-group-item"><b>Tanggal Daftar</b>
                                            <a
                                                class="float-right"><?= Date('d-m-Y', strtotime($item->created_at ?? '')) ?></a>
                                        </li>
                                        <label class="form-label">
                                            <span class="badge border-dark border-1 text-dark">
                                                <i style="color: rgb(245, 39, 24)"><b>Note : Jika Status Pembayaran Telah
                                                        Diterima, Cetak Formulir Pendaftaran untuk sebagai Bukti</b></i>
                                            </span>
                                        </label>
                                        <div align="center">
                                            @if ($status < 1)
                                                <button type="button" class="btn btn-lg btn-danger" disabled>
                                                    {{ Auth::user()->pembayaran->status ?? '- Belum Konfirmasi Pembayaran -' }}
                                                </button>
                                            @else
                                                <a href="/formulir/pendaftaran" target="_blank" class="btn btn-primary">
                                                    Cetak Formulir Pendaftaran
                                                </a>
                                            @endif
                                        </div>

                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
    </div>
    </section>
    </div>
@endsection
@section('grafik')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('grafik', {
            chart: {
                type: 'column'
            },
            title: {
                text: ' '
            },
            xAxis: {
                categories: [
                    ''
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:1f} Orang</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'Pendaftar',
                    data: [{!! json_encode($daftar) !!}]

                }, {
                    name: 'Pembayaran',
                    data: [{!! json_encode($bayar) !!}]

                },
                {
                    name: 'Pegawai',
                    data: [{!! json_encode($pegawai) !!}]

                },
                {
                    name: 'Siswa',
                    data: [{!! json_encode($siswa) !!}]

                }
            ]
        });
    </script>
@endsection
@section('container')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Average Rainfall'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Tokyo',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,
                    194.1, 95.6, 54.4
                ]

            }, {
                name: 'New York',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5,
                    106.6, 92.3
                ]

            }, {
                name: 'London',
                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3,
                    51.2
                ]

            }, {
                name: 'Berlin',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8,
                    51.1
                ]

            }]
        });
    </script>
@endsection
