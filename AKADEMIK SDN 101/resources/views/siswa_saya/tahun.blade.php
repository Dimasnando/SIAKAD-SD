@extends('layouts.backend')

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
                                                    <th>Tahun Ajaran</th>
                                                    <th></th>
                                                    <th class="text-center">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($tahun->count() == 0)
                                                    <tr align="center">
                                                        <th colspan="3">Belum Ada Data !!!</th>
                                                    </tr>
                                                @else
                                                    @foreach ($tahun as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td></td>
                                                            <td nowrap align="center">
                                                                <a href="/siswa-saya/tahun/{{ $item->id }}/"
                                                                    class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-search"></i> Pilih Tahun
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
                </div>
            </section>
        </div>

    </main>
@endsection
