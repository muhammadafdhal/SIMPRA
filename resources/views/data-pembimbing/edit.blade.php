@extends('template.app')

@section('siswa')
nav-item dropdown active
@endsection

@section('pembimbing')
active
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Form</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">{{$title}}</a></div>
                <div class="breadcrumb-item"><a href="/pem">{{$title2}}</a></div>
                <div class="breadcrumb-item">Edit Data</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Data Pembimbing</h4>
                        </div>
                        <form action="/pem/edit/{{ $pembimbing->id }}/save" method="POST">
                            @csrf {{ method_field('patch')}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" required value={{$pembimbing->name}} placeholder="Masukan Nama Lengkap"
                                        class="form-control">
                                    <input type="text" name="password" value="12345678" hidden
                                        placeholder="Masukan Nama Lengkap" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>NIP/NIK</label>
                                    <input type="number" name="us_nim" required value={{$pembimbing->us_nim}} placeholder="Masukan NIP/NIK"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" required value={{$pembimbing->email}} placeholder="Masukan Email"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" required value={{$pembimbing->us_tmp_lahir}} name="us_tmp_lahir"
                                        placeholder="Masukan Tempat Lahir" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" required value={{$pembimbing->us_tgl_lahir}} name="us_tgl_lahir"
                                        placeholder="Masukan Tanggal Lahir" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" required value={{$pembimbing->us_alamat}} name="us_alamat" placeholder="Masukan Alamat"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No HP</label>
                                    <input type="number" required value={{$pembimbing->us_no}} name="us_no" placeholder="Masukan Alamat"
                                        class="form-control">
                                </div>
                                <div class="buttons">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="/pem" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
