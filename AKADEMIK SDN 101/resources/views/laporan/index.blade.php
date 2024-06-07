@extends('layouts.backend')

@section('content')
    <main>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Laporan</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home', []) }}">Dashboard</a></div>
                        <div class="breadcrumb-item">Laporan</div>
                    </div>
                </div>
                <div class="section-body">

                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="breadcrumb-item"><b>Laporan Nilai Siswa</b></div>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-6 col-sm-6">
                                            <label>Pilih Nama</label>
                                            <select name="pendaftar_id" id="id"
                                                class="multisteps-form__select form-control">
                                                <option value="/" selected disabled>-- PILIH --</option>
                                                @foreach ($siswa as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <label>Pilih Tahun</label>
                                            <select name="tahun_id" id="thn"
                                                class="multisteps-form__select form-control">
                                                <option value="/" selected disabled>-- PILIH --</option>
                                                @foreach ($tahun as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group" style="margin-top: 20px">
                                        <a href="#"
                                            onclick="this.href='/laporans/nilai/'+document.getElementById('id').value +
                                            '/' + document.getElementById('thn').value"
                                            target="_blank" class="btn btn-primary">Lihat
                                        </a>
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
