@extends('template.app')

@section('dashboard')
active
@endsection

@section('content')
@if (Auth::user()->us_level == "Admin")
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        @if(session('status-password'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('status-password')}}
        </div>
        @endif

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Verifikasi Berkas</h4>
                        </div>
                        <div class="card-body">
                            {{count($vb)}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Verifikasi Pembimbing</h4>
                        </div>
                        <div class="card-body">
                            {{count($vp)}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Verifikasi Nilai</h4>
                        </div>
                        <div class="card-body">
                            {{count($vn)}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Tempat PKL</h4>
                        </div>
                        <div class="card-body">
                            {{count($pkl)}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

@else
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero align-items-center bg-success text-white">
                    <div class="hero-inner text-center">
                    <h2>Selamat Datang, {{Auth::user()->name}}</h2>
                        <p class="lead">Anda Telah Berhasil Login Di Sistem Informasi PKL Fakultas Ushuluddin UIN SUSKA RIAU, Selanjutnya Anda Bisa Melakukan Update Profile & Update Password Anda.</p>
                        <div class="mt-4">
                            <a href="/profile" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endif

@endsection
