@extends('template.app')

@section('siswa')
nav-item dropdown active
@endsection

@section('siswa2')
active
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengisian Form</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">{{$title}}</a></div>
                <div class="breadcrumb-item"><a href="/siswa">{{$title2}}</a></div>
                <div class="breadcrumb-item">Tambah Data</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Data Siswa</h4>
                        </div>
                        <form action="/siswa/tambah/save" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" required placeholder="Masukan Nama Lengkap" class="form-control">
                                <input type="text" name="password" value="12345678" hidden placeholder="Masukan Nama Lengkap" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="number" required name="us_nim" placeholder="Masukan NIM" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control" required name="us_jurusan">
                                    <option value="">=== Silahkan Pilih Jurusan ===</option>
                                    <option value="Aqidah & Filsafat">Aqidah & Filsafat</option>
                                    <option value="Perbandingan Agama">Perbandingan Agama</option>
                                    <option value="Ilmu Al-Qur'an & Tafsir">Ilmu Al-Qur'an & Tafsir</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" required placeholder="Masukan Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="us_tmp_lahir" required placeholder="Masukan Tempat Lahir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="us_tgl_lahir" required placeholder="Masukan Tanggal Lahir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="us_alamat" required placeholder="Masukan Alamat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="number" name="us_no" required placeholder="Masukan Alamat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="us_foto" required placeholder="Masukan Foto" class="form-control">
                            </div>
                            <div class="buttons">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/siswa" class="btn btn-danger">Kembali</a>
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
