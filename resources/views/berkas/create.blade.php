@extends('template.app')

@section('berkas')
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
                <div class="breadcrumb-item"><a href="/berkas">{{$title2}}</a></div>
                <div class="breadcrumb-item">Tambah Data</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Data PKL</h4>
                        </div>
                        <form action="/berkas/tambah/save" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Surat File</label>
                                    <input type="file" name="berkas_fotoSurat" placeholder="Masukan File/Surat Anda."
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Surat</label>
                                    <select class="form-control" required name="berkas_jenis">
                                        <option value="">=== Silahkan Pilih ===</option>
                                        <option value="KHS">Surat KHS</option>
                                        <option value="Surat PKL">Surat PKL</option>
                                    </select>
                                </div>
                                <div class="buttons">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <a href="/berkas" class="btn btn-danger">Kembali</a>
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
