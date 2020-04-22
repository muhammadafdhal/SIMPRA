@extends('template.app')

@section('nilai')
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
                <div class="breadcrumb-item"><a href="/nilai">{{$title2}}</a></div>
                <div class="breadcrumb-item">Tambah Data</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Data Nilai</h4>
                        </div>
                        <form action="/nilai/tambah/{{$siswa->md_id}}/save" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kedisiplinan</label>
                                    <input type="number" name="nilai_kedisiplinan"
                                        placeholder="Masukan Nilai Kedisiplinan (10 - 100)." class="form-control"
                                        min="10" max="100" required>
                                </div>
                                <div class="form-group">
                                    <label>Kreatifitas</label>
                                    <input type="number" name="nilai_kreatifitas"
                                        placeholder="Masukan Nilai Kreatifitas (10 - 100)." class="form-control"
                                        min="10" max="100" required>
                                </div>
                                <div class="form-group">
                                    <label>Penguasaan Materi</label>
                                    <input type="number" min="10" max="100" name="nilai_penguasaanMateri"
                                        placeholder="Masukan Nilai Penguasaan Materi (10 - 100)." class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Kehadiran</label>
                                    <input type="number" name="nilai_kehadiran" min="10" max="100"
                                        placeholder="Masukan Nilai Kehadiran (10 - 100)." class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggung Jawab</label>
                                    <input type="number" min="10" max="100" name="nilai_tanggungJawab"
                                        placeholder="Masukan Nilai Tanggung Jawab (10 - 100)." class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Komunikasi</label>
                                    <input type="number" name="nilai_komunikasi" min="10" max="100"
                                        placeholder="Masukan Nilai Komunikasi (10 - 100)." class="form-control"
                                        required>
                                </div>
                                <div class="buttons">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <a href="/nilai" class="btn btn-danger">Kembali</a>
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
