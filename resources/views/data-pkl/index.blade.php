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
                            <h4>Tabel Tempat PKL</h4>
                        </div>
                        <div class="card-body">

                            <div class="button">
                                <a href="/pkl/tambah" class="btn btn-icon btn-primary"><i class="fa fa-plus"></i>
                                    Tambah Data</a>
                            </div>
                            <br>
                            <table id="example" class="table table-hover" border="1" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sekolah</th>
                                        <th>Profil</th>
                                        {{-- <th>Kecamatan</th> --}}
                                        <th>Kabupaten</th>
                                        <th>No HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody align="center">

                                    <?php
                                        $no = 1;
                                        ?>

                                    @foreach ($pkl as $t)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td>{{$t->pkl_nama_sekolah}}</td>
                                        <td>{{$t->pkl_profil}}</td>
                                        {{-- <td>{{$t->kec_nama}}</td> --}}
                                        <td>{{$t->kabkota_nama}}</td>
                                        <td>{{$t->pkl_no}}</td>
                                        <td class="datatable-ct">
                                            <a href="/pkl/edit/{{ $t->pkl_id }}" class="btn btn-info">Edit</a>
                                            <br><br>
                                            <form method="POST" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')" action="/pkl/delete/{{ $t->pkl_id }}">
                                                {{csrf_field()}} {{method_field('DELETE')}}

                                                <button type="submit" class="btn btn-danger">Hapus</a></button>
                                            </form>
                                        </td>
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
