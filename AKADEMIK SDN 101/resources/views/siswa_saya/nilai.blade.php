@extends('layouts.backend')

<?php
use App\Models\Siswa;
?>

@section('content')
    <main>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Siswa</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home', []) }}">Dashboard</a></div>
                        {{-- <div class="breadcrumb-item"><a href="#">Modules</a></div> --}}
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
                                <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th width="6%">No</th>
                                                        <th>Nama</th>
                                                        <th>NISN</th>
                                                        <th>MTK</th>
                                                        <th>B.Indo</th>
                                                        <th>Seni</th>
                                                        <th>Pend.Agama</th>
                                                        <th>Jasmani</th>
                                                        <th>B.Ingg</th>
                                                        <th>BTA</th>
                                                        <th>IPAS</th>
                                                        <th>Pilihan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $mtk = 0;
                                                        $r_mtk = 0;
                                                        $bindo = 0;
                                                        $r_bindo = 0;
                                                        $seni = 0;
                                                        $r_seni = 0;
                                                        $agama = 0;
                                                        $r_agama = 0;
                                                        $penjas = 0;
                                                        $r_penjas = 0;
                                                        $bing = 0;
                                                        $r_bing = 0;
                                                        $bta = 0;
                                                        $r_bta = 0;
                                                        $ipas = 0;
                                                        $r_ipas = 0;
                                                    @endphp
                                                    @foreach ($siswa as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->nis }}</td>
                                                            <td>
                                                                {{ !empty($item->nilai_mtk) ? floor($item->nilai_mtk) : '-' }}
                                                            </td>
                                                            <td>
                                                                {{ !empty($item->nilai_bhs_indo) ? floor($item->nilai_bhs_indo) : '-' }}
                                                            </td>
                                                            <td>
                                                                {{ !empty($item->nilai_seni) ? floor($item->nilai_seni) : '-' }}
                                                            </td>
                                                            <td>
                                                                {{ !empty($item->nilai_agama) ? floor($item->nilai_agama) : '-' }}
                                                            </td>
                                                            <td>
                                                                {{ !empty($item->nilai_penjas) ? floor($item->nilai_penjas) : '-' }}
                                                            </td>
                                                            <td>
                                                                {{ !empty($item->nilai_bhs_ing) ? floor($item->nilai_bhs_ing) : '-' }}
                                                            </td>
                                                            <td>
                                                                {{ !empty($item->nilai_bta) ? floor($item->nilai_bta) : '-' }}
                                                            </td>
                                                            <td>
                                                                {{ !empty($item->nilai_ipas) ? floor($item->nilai_ipas) : '-' }}
                                                            </td>
                                                            <td nowrap>
                                                                <a href="/siswa-saya/nilai/{{ $item->id }}/"
                                                                    class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-search"></i> Detail
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $mtk += $item->nilai_mtk;
                                                            !empty($item->nilai_mtk) ? $r_mtk += 1 : $r_mtk;
                                                            $bindo += $item->nilai_bhs_indo;
                                                            !empty($item->nilai_bhs_indo) ? $r_bindo += 1 : $r_bindo;
                                                            $seni += $item->nilai_seni;
                                                            !empty($item->nilai_seni) ? $r_seni += 1 : $r_seni;
                                                            $agama += $item->nilai_agama;
                                                            !empty($item->nilai_agama) ? $r_agama += 1 : $r_agama;
                                                            $penjas += $item->nilai_penjas;
                                                            !empty($item->nilai_penjas) ? $r_penjas += 1 : $r_penjas;
                                                            $bing += $item->nilai_bhs_ing;
                                                            !empty($item->nilai_bhs_ing) ? $r_bing += 1 : $r_bing;
                                                            $bta += $item->nilai_bta;
                                                            !empty($item->nilai_bta) ? $r_bta += 1 : $r_bta;
                                                            $ipas += $item->nilai_ipas;
                                                            !empty($item->nilai_ipas) ? $r_ipas += 1 : $r_ipas;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th colspan="3" style="color: rgb(33, 98, 236)" class="text-center">
                                                        Rata - Rata
                                                    </th>
                                                    <th>{{ !empty($mtk) ? floor($mtk / $r_mtk) : '-' }}</th>
                                                    <th>{{ !empty($bindo ) ? floor($bindo / $r_bindo) : '-' }}</th>
                                                    <th>{{ !empty($seni ) ? floor($seni / $r_seni) : '-' }}</th>
                                                    <th>{{ !empty($agama ) ? floor($agama / $r_agama) : '-' }}</th>
                                                    <th>{{ !empty($penjas) ? floor($penjas / $r_penjas) : '-' }}</th>
                                                    <th>{{ !empty($bing ) ? floor($bing / $r_bing) : '-' }}</th>
                                                    <th>{{ !empty($bta ) ? floor($bta / $r_bta) : '-' }}</th>
                                                    <th>{{ !empty($ipas) ? floor($ipas / $r_ipas) : '-' }}</th>
                                                </tr>
                                            </tfoot>
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
