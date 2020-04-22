@extends('template.app')

@section('laporan')
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

                            @if (Auth::user()->us_level == "Siswa")
                                
                            
                            <div class="button">
                                <a href="/laporan/tambah" class="btn btn-icon btn-primary"><i class="fa fa-plus"></i>
                                    Upload Laporan</a>
                            </div>
                            @endif
                            <br>
                            <table id="example" class="table table-hover" border="1" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>File Laporan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $no = 1;
                                        ?>

                                    @foreach ($laporan as $t)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        
                                        {{-- <td>{{$t->lp_file}}</td> --}}
                                        <td align="center"><a class="btn-primary btn-sm" href="/laporan/download/{{ $t->lp_file }}" target="_blank">
                                            <i class="fa  fa-download"></i> Download
                                        </a></td>
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
