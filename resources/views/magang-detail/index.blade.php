@extends('template.app')

@section('status-magang')
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

        @if(session('status-magang'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('status-magang')}}
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
                            <h4>Tempat Magang/PKL</h4>
                        </div>
                        <div class="card-body">

                            @if (count($md) == 0 && Auth::user()->us_level == "Siswa" )
                            <div class="button">
                                <a href="/md/tambah" class="btn btn-icon btn-primary"><i class="fa fa-plus"></i>
                                    Pilih Tempat</a>
                            </div>
                            @endif

                            <br>
                            <table id="example" class="table table-hover" border="1" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>NIM</th>
                                        <th>Jurusan</th>
                                        <th>Tempat PKL</th>
                                        @if (Auth::user()->us_level=='Admin' || Auth::user()->us_level=='Guru')
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody align="center">

                                    <?php
                                        $no = 1;
                                        ?>


                                    @if (Auth::user()->us_level == "Admin")

                                    {{-- tampilan untuk admin --}}
                                    @foreach ($admin as $t)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td>{{$t->name}}</td>
                                        <td>{{$t->us_nim}}</td>
                                        <td>{{$t->us_jurusan}}</td>
                                        <td>{{$t->pkl_nama_sekolah}}</td>
                                        @if (Auth::user()->us_level=='Admin' || Auth::user()->us_level=='Guru')
                                        <td class="datatable-ct">
                                            <a href="/md/pembimbing-pkl/{{ $t->md_id }}" class="btn btn-info">Tentukan Pembimbing</a>
                                            <br><br>
                                            <form method="POST"
                                                onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"
                                                action="/md/delete/{{ $t->md_id }}">
                                                {{csrf_field()}} {{method_field('DELETE')}}

                                                <button type="submit" class="btn btn-danger">Hapus</a></button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach

                                    @elseif(Auth::user()->us_level == "Siswa")

                                    {{-- tampilan untuk siswa --}}
                                    @foreach ($md as $t)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td>{{$t->name}}</td>
                                        <td>{{$t->us_nim}}</td>
                                        <td>{{$t->us_jurusan}}</td>
                                        <td>{{$t->pkl_nama_sekolah}}</td>
                                        @if (Auth::user()->us_level=='Admin' || Auth::user()->us_level=='Guru')
                                        <td class="datatable-ct">
                                            <a href="/md/pembimbing-pkl/{{ $t->md_id }}" class="btn btn-info">Edit</a>
                                            <br><br>
                                            <form method="POST"
                                                onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"
                                                action="/md/delete/{{ $t->md_id }}">
                                                {{csrf_field()}} {{method_field('DELETE')}}

                                                <button type="submit" class="btn btn-danger">Hapus</a></button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    @endif
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
