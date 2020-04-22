@extends('template.app')

@section('status-pembimbing-pkl')
active
@endsection

@section('content')

<div class="main-content">

    <section class="section">
        <div class="section-header">
            <h1>Data Pembimbing PKL</h1>
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
                        <div class="card-body">

                            <br>
                            <table id="example" class="table table-hover" border="1" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        @if (Auth::user()->us_level == "Admin" || Auth::user()->us_level == "Guru")
                                        <th>Nama Siswa</th>
                                        <th>NIM Mahasiswa.</th>
                                        <th>Jurusan.</th>
                                        @elseif (Auth::user()->us_level == "Siswa")
                                        <th>Nama Guru.</th>
                                        <th>NIP/NIK Guru.</th>

                                        @endif
                                        
                                        <th>No Telp.</th>
                                        <th>Tempat PKL</th>
                                        @if (Auth::user()->us_level == "Admin")
                                        <th>Nama Guru</th>
                                        @endif
                                        
                                    </tr>
                                </thead>
                                <tbody align="center">

                                    <?php
                                        $no = 1;
                                        ?>

                                    @if (Auth::user()->us_level == "Admin")
                                        
                                    
                                    @foreach ($pbb as $t)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td>{{$t->name}}</td>
                                        <td>{{$t->us_nim}}</td>
                                        <td>{{$t->us_jurusan}}</td>
                                        <td>{{$t->us_no}}</td>
                                        <td>{{$t->pkl_nama_sekolah}}</td>
                                        <td>{{$t->nama_guru}}</td>
                                    </tr>
                                    @endforeach

                                    @elseif(Auth::user()->us_level == "Guru")

                                    @foreach ($pbb2 as $t)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        
                                        <td>{{$t->name}}</td>
                                        <td>{{$t->us_nim}}</td>
                                        <td>{{$t->us_jurusan}}</td>
                                        <td>{{$t->us_no}}</td>
                                        
                                        <td>{{$t->pkl_nama_sekolah}}</td>
                                    </tr>
                                    @endforeach

                                    @elseif(Auth::user()->us_level == "Siswa")

                                    @foreach ($pbb3 as $t)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td>{{$t->nama_guru}}</td>
                                        <td>{{$t->nip}}</td>
                                        <td>{{$t->no}}</td>
                                        <td>{{$t->pkl_nama_sekolah}}</td>
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
