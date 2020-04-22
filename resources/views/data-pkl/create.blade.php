@extends('template.app')

@section('siswa')
nav-item dropdown active
@endsection

@section('pkl')
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
                <div class="breadcrumb-item"><a href="/pkl">{{$title2}}</a></div>
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
                        <form action="/pkl/tambah/save" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Sekolah</label>
                                    <input type="text" name="pkl_nama_sekolah" placeholder="Masukan Nama Sekolah"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Profil Sekolah</label>
                                    <input type="text" name="pkl_profil" placeholder="Masukan Profil Sekolah"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Kabkota</label>
                                    <select class="form-control" name="pkl_kec_id" id="provinsi" required>
                                        <option value="" disable="true" selected="true">=== Silahkan Pilih Provinsi ===
                                        </option>
                                        @foreach ($kabkota as $key => $t)
                                        <option value="{{$t->kabkota_id}}">{{ $t->kabkota_nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Kab/Kota</label>
                                    <select class="form-control" name="kabkota" id="kabkota" required>
                                        <option value="" disable="true" selected="true">=== Silahkan Pilih Kab/Kota
                                            Dahulu ===</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select class="form-control" name="pkl_kec_id" id="kec" required>
                                        <option value="" disable="true" selected="true">=== Silahkan Pilih Kab/Kota
                                            Dahulu ===</option>
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label>No HP Sekolah</label>
                                    <input type="number" name="pkl_no" placeholder="Masukan No HP" class="form-control"
                                        required>
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
