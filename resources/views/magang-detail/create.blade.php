@extends('template.app')

@section('status-magang')
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
                <div class="breadcrumb-item"><a href="/md">{{$title2}}</a></div>
                <div class="breadcrumb-item">Pilih Tempat Magang</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tempat Magang</h4>
                        </div>
                        <form action="/md/tambah/save" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                
                                    <select class="form-control" name="md_pkl_id" required>
                                        <option value="" disable="true" selected="true">=== Tentukan Sekolah/Instansi ===
                                        </option>
                                        
                                        @foreach ($pkl as $key => $t)
                                        <option value="{{$t->pkl_id}}">{{ $t->pkl_nama_sekolah}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="buttons">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="/md" class="btn btn-danger">Kembali</a>
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
