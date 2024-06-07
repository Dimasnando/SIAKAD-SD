
@extends('layouts.backend')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit {{ $edit->nama }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('informasi') }}">Informasi</a></div>
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
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="/informasi/update/{{ $edit->id }}/" method="POST" enctype="multipart/form-data"
                                class="needs-validation" novalidate="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4 col-12">
                                            <label>Foto</label>
                                            <input type="file" name="foto" class="form-control"
                                                value="{{ $edit->foto }}" >
                                        </div>
                                        <div class="form-group col-md-8 col-12">
                                            <label>Isi</label>
                                            <input type="text" name="isi" class="form-control"
                                                value="{{ $edit->isi }}" placeholder="Nama Aset">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
