@extends('template.app')

@section('nilai')
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

                                @if (Auth::user()->us_level == "Admin" || Auth::user()->us_level == "Guru")
                                <a href="/nilai/tambah" class="btn btn-icon btn-primary"><i class="fa fa-plus"></i>
                                    Input Nilai</a>
                                @endif
                            </div>
                            <br>
                            <table id="example" class="table table-hover" border="1" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kedisiplinan</th>
                                        <th>Kreatifitas</th>
                                        <th>Penguasaan Materi</th>
                                        <th>Kehadiran</th>
                                        <th>Tanggung Jawab</th>
                                        <th>Komunikasi</th>
                                        {{-- s --}}
                                    </tr>
                                </thead>
                                <tbody align="center">

                                    <?php
                                        $no = 1;
                                        ?>

                                    @foreach ($nilai as $t)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td>{{$t->nilai_kedisiplinan}}</td>
                                        <td>{{$t->nilai_kreatifitas}}</td>
                                        <td>{{$t->nilai_penguasaanMateri}}</td>
                                        <td>{{$t->nilai_kehadiran}}</td>
                                        <td>{{$t->nilai_tanggungJawab}}</td>
                                        <td>{{$t->nilai_komunikasi}}</td>
                                        {{-- <td class="datatable-ct">
                                            <a href="/nilai/edit/{{ $t->id }}" class="btn btn-info">Edit</a>
                                            <br><br>
                                            <form method="POST"
                                                onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"
                                                action="/nilai/delete/{{ $t->id }}">
                                                {{csrf_field()}} {{method_field('DELETE')}}

                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td> --}}
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
