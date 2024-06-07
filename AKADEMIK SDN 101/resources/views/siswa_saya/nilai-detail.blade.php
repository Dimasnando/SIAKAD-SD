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
                                <div class="card-header">
                                    <table class="table-mahasiswa" width="100%">
                                        <tr>
                                            <td width="15%">Nama </td>
                                            <th> : {{ $kelas->nama }} </th>
                                        </tr>
                                        <tr>
                                            <td width="15%">NISN</td>
                                            <th> : {{ $kelas->nis }} </th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-body">
                                    @if ($jika > 1)
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
                                                    @foreach ($nilai as $mapel => $data)
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
                                    @else
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th width="6%">No</th>
                                                    <th>Mapel</th>
                                                    @foreach ($nilai as $mapel => $data)
                                                        @foreach ($data as $v)
                                                            <th>{{ $v->jenis }}</th>
                                                        @endforeach
                                                    @endforeach
                                                    <th>Hasil</th>
                                                    <th class="text-center">Ket</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($nilai as $mapel => $data)
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
                                                                <span class="badge badge-pill badge-primary">Tuntas</span>
                                                            @else
                                                                <span class="badge badge-pill badge-danger">Tidak
                                                                    Tuntas</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main>
@endsection
