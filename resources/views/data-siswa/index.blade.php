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
                            <h4>Tabel Siswa</h4>
                        </div>
                        <div class="card-body">

                            <div class="button">
                                <a href="/siswa/tambah" class="btn btn-icon btn-primary"><i class="fa fa-plus"></i>
                                    Tambah Data</a>
                            </div>
                            <br>
                            <table id="example" class="table table-hover" border="1" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Jurusan</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    <?php
                                        $no = 1;
                                        ?>

                                    @foreach ($siswa as $t)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td>{{$t->name}}</td>
                                        <td>{{$t->us_nim}}</td>
                                        <td>{{$t->us_jurusan}}</td>
                                        <td>{{$t->us_alamat}}</td>
                                        <td>{{$t->us_no}}</td>
                                        <td>{{$t->us_tmp_lahir}}</td>
                                        <td>{{$t->us_tgl_lahir}}</td>
                                        <td><img src="/gambar/fotoMahasiswa/{{$t->us_foto }}"
                                            class="img-fluid img-thumbnail" alt="Responsive image"></td>
                                        <td class="datatable-ct">
                                            <a href="/siswa/edit/{{ $t->id }}" class="btn btn-info">Edit</a>
                                            <br><br>
                                            <form method="POST" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')" action="/siswa/delete/{{ $t->id }}">
                                                {{csrf_field()}} {{method_field('DELETE')}}

                                                <button type="submit" class="btn btn-danger">Hapus</button>
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
