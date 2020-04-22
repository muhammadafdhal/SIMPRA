@extends('template.app')

@section('berkas')
active
@endsection

@section('content')

<div class="main-content">

    <section class="section">
        <div class="section-header">
            <h1>Data Master</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">{{$title}}</a></div>
                <div class="breadcrumb-item">{{$title2}}</div>
            </div>
        </div>

        @if(session('sukses'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('sukses')}}
        </div>
        @endif

        @if(session('verified'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('verified')}}
        </div>
        @endif

        @if(session('update'))
        <div class="alert alert-info alert-dismissible show fade" role="alert">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('update')}}
        </div>
        @endif

        @if(session('delete'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('delete')}}
        </div>
        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel berkas</h4>
                        </div>
                        <div class="card-body">

                            <div class="button">
                                @if (count($berkas) < 3)
                                <a href="/berkas/tambah" class="btn btn-icon btn-primary"><i class="fa fa-plus"></i>
                                    Upload Surat</a>
                                    @endif
                            </div>
                            <br>
                            <table id="example" class="table table-hover" border="1" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Surat/File</th>
                                        <th>Jenis Surat</th>
                                        <th>Status</th>
                                        @if (Auth::user()->us_level =='Admin')
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody align="center">

                                    <?php
                                        $no = 1;
                                        ?>

                                    @foreach ($berkas as $t)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td><img src="/gambar/berkasSurat/{{$t->berkas_fotoSurat }}"
                                                class="img-fluid img-thumbnail" alt="Responsive image"></td>
                                        <td>{{$t->berkas_jenis}}</td>
                                        @if($t->berkas_status=="Belum")
                                        <td><span class="badge badge-danger">{{$t->berkas_status}}</span>
                                        </td>
                                        @else
                                        <td><span class="badge badge-success">{{$t->berkas_status}}</span>
                                        </td>
                                        @endif

                                        {{-- verifikasi berkas --}}
                                        @if (Auth::user()->us_level =='Admin')
                                        @if($t->berkas_status=="Belum")
                                        <td class="datatable-ct">
                                            <a href="/berkas/verified/{{ $t->id }}" class="btn btn-success">Verifikasi</a>
                                        </td>
                                        @else
                                        <td class="datatable-ct">
                                            <a href="/berkas/batal/{{ $t->id }}" class="btn btn-danger">Batal</a>
                                        </td>
                                        @endif
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>


@endsection
