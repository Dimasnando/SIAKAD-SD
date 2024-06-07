@extends('layouts.backend')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('pendaftar') }}">Pendaftar</a></div>
                    <div class="breadcrumb-item">Detail</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2 col-sm-2 col-md-2">
                                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#diri"
                                                    role="tab" aria-controls="home" aria-selected="true">Data Diri
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#ibu"
                                                    role="tab" aria-controls="contact" aria-selected="false">Data
                                                    Ibu
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#ayah"
                                                    role="tab" aria-controls="profile" aria-selected="false">Data
                                                    Ayah
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#alamat"
                                                    role="tab" aria-controls="profile" aria-selected="false">Data
                                                    Alamat
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#file"
                                                    role="tab" aria-controls="profile" aria-selected="false">Data
                                                    File Pendukung
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-10 col-sm-10 col-md-10">
                                        <div class="tab-content no-padding" id="myTab2Content">
                                            <div class="tab-pane fade show active" id="diri" role="tabpanel"
                                                aria-labelledby="home-tab4">
                                                <div class="card-header">
                                                    <h4>Data Diri</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-10 col-10">
                                                            <label>Nama Lengkap</label>
                                                            <input type="text" name="nama" placeholder="Nama Lengkap"
                                                                class="form-control" required=""
                                                                value="{{ $detail->nama }}" disabled>
                                                        </div>
                                                        <div class="form-group col-md-2 col-2">
                                                            <label>Jenis Kelamain</label>
                                                            <input type="text" placeholder="Nama Lengkap"
                                                                class="form-control" required=""
                                                                value="{{ $detail->jk }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-3 col-3">
                                                            <label>Golongan Darah</label>
                                                            <input type="text" placeholder="Nama Lengkap"
                                                                class="form-control" required=""
                                                                value="{{ $detail->goldarah }}" disabled>
                                                        </div>
                                                        <div class="form-group col-md-3 col-3">
                                                            <label>Agama</label>
                                                            <input type="text" placeholder="Nama Lengkap"
                                                                class="form-control" required=""
                                                                value="{{ $detail->agama }}" disabled>
                                                        </div>
                                                        <div class="form-group col-md-3 col-3">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" placeholder="Nama Lengkap"
                                                                class="form-control" required=""
                                                                value="{{ $detail->tempat }}" disabled>
                                                        </div>
                                                        <div class="form-group col-md-3 col-3">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" disabled class="form-control"
                                                                required="" value="{{ $detail->ttl }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-4 col-4">
                                                            <label>Asal Sekolah</label>
                                                            <input type="text" name="asal_skolah" class="form-control"
                                                                required="" placeholder="Asal Sekolah"
                                                                value="{{ $detail->asal_skolah }}" disabled>
                                                        </div>
                                                        <div class="form-group col-md-4 col-4">
                                                            <label>NIS</label>
                                                            <input type="number" name="nis" class="form-control"
                                                                required="" placeholder="NIS Sekolah Sebulumnya"
                                                                value="{{ $detail->nis }}" disabled>
                                                        </div>
                                                        <div class="form-group col-md-4 col-4">
                                                            <label>NoHp</label>
                                                            <input type="number" name="hp" class="form-control"
                                                                required="" placeholder="Nomor Hp/Wa"
                                                                value="{{ $detail->hp }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="ibu" role="tabpanel"
                                                aria-labelledby="contact-tab4">
                                                <div class="card-header">
                                                    <h4>Data Ibu</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-6">
                                                            <label>Nama</label>
                                                            <input type="text" name="ibu" class="form-control"
                                                                disabled value="{{ $detail->ibu }}">
                                                        </div>
                                                        <div class="form-group col-md-6 col-6">
                                                            <label>Pendidikan</label>
                                                            <input type="text" placeholder="Nama Lengkap"
                                                                class="form-control" required=""
                                                                value="{{ $detail->kerja_ibu }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-6">
                                                            <label>Pekerjaan</label>
                                                            <input type="text" class="form-control" required=""
                                                                value="{{ $detail->jk }}" disabled>
                                                        </div>
                                                        <div class="form-group col-md-6 col-6">
                                                            <label>No Hp</label>
                                                            <input type="number" name="hp_ibu" class="form-control"
                                                                disabled value="{{ $detail->hp_ibu }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="ayah" role="tabpanel"
                                                aria-labelledby="profile-tab4">
                                                <div class="card-header">
                                                    <h4>Data Ayah</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-6">
                                                            <label>Nama</label>
                                                            <input type="text" name="ayah" class="form-control"
                                                                disabled value="{{ $detail->ayah }}">
                                                        </div>
                                                        <div class="form-group col-md-6 col-6">
                                                            <label>Pendidikan</label>
                                                            <input type="text" placeholder="Nama Lengkap"
                                                                class="form-control" required=""
                                                                value="{{ $detail->pendidikan_ayah }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-6">
                                                            <label>Pekerjaan</label>
                                                            <input type="text" placeholder="Nama Lengkap"
                                                                class="form-control" required=""
                                                                value="{{ $detail->kerja_ayah }}" disabled>
                                                        </div>
                                                        <div class="form-group col-md-6 col-6">
                                                            <label>No Hp</label>
                                                            <input type="number" min="1" name="hp_ayah"
                                                                class="form-control" disabled
                                                                value="{{ $detail->hp_ayah }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="alamat" role="tabpanel"
                                                aria-labelledby="profile-tab4">
                                                <div class="card-header">
                                                    <h4>Data Alamat</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-12 col-12">
                                                            <label>Alamat Lengkap</label>
                                                            <textarea name="alamat" id="" cols="30" rows="3" class="form-control" disabled
                                                                required=""> {{ $detail->alamat }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-6">
                                                            <label>Kecamatan</label>
                                                            <input type="text" class="form-control" disabled
                                                                value="{{ $detail->kec }}">
                                                        </div>
                                                        <div class="form-group col-md-6 col-6">
                                                            <label>Kelurahan</label>
                                                            <input type="text" disabled class="form-control"
                                                                required="" value="{{ $detail->kel }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="file" role="tabpanel"
                                                aria-labelledby="profile-tab4">
                                                <div class="card-header">
                                                    <h4>Data File Pendukung</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-4 col-4">
                                                            <label>Kartu Keluarga</label>
                                                            <label class="form-label">
                                                                <span class="badge border-dark border-1 text-dark">
                                                                    <i class="fa fa-download">
                                                                        <b>
                                                                            <a href="{{ url('/file/' . $detail->kk ?? '--') }}"
                                                                                target="_blank">File KK
                                                                                Sebelumnya</a>
                                                                        </b>
                                                                    </i>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group col-md-4 col-4">
                                                            <label>Pas Foto</label>
                                                            <label class="form-label">
                                                                <span class="badge border-dark border-1 text-dark">
                                                                    <i class="fa fa-download">
                                                                        <b>
                                                                            <a href="{{ url('/file/' . $detail->foto ?? '--') }}"
                                                                                target="_blank">File Foto
                                                                                Sebelumnya</a>
                                                                        </b>
                                                                    </i>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group col-md-4 col-4">
                                                            <label>Ijazah Terakhir/SMP</label>
                                                            <label class="form-label">
                                                                <span class="badge border-dark border-1 text-dark">
                                                                    <i class="fa fa-download">
                                                                        <b>
                                                                            <a href="{{ url('/file/' . $detail->ijazah ?? '--') }}"
                                                                                target="_blank">File Ijazah
                                                                                Sebelumnya</a>
                                                                        </b>
                                                                    </i>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
