@extends('template.app')
@section('content')



<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">User</div>
            </div>
        </div>
        @if(session('status-profile'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('status-profile')}}
        </div>
        @endif

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-sm-12 col-lg-5">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="author-box-left">
                                <img alt="image" src="/gambar/fotoMahasiswa/{{Auth::user()->us_foto }}"
                                    class="rounded-circle author-box-picture" width="100" height="150">
                                <div class="clearfix"></div>
                            </div>
                            <div class="author-box-details">
                                <div class="author-box-name">
                                    <a href="#">{{Auth::user()->name}}</a>
                                </div>
                                <div class="author-box-job">{{Auth::user()->us_level}}</div>
                                <div class="author-box-description">
                                    <p>Email : {{Auth::user()->email}}</p>
                                    <p>NIK/NIP/NIM : {{Auth::user()->us_nim}}</p>
                                    <p>No Telp : {{Auth::user()->us_no}}</p>
                                    <p>Alamat : {{Auth::user()->us_alamat}}</p>
                                </div>
                                <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-social-icon mr-1 btn-github">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <div class="w-100 d-sm-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="/profile/{{Auth::user()->id}}/save" class="needs-validation" novalidate="">
                            @csrf{{ method_field('patch')}}
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>NIK/NIP/NIM</label>
                                    <input type="text" class="form-control" name="us_nim" value="{{Auth::user()->us_nim}}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the last name
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>No Telp.</label>
                                    <input type="tel" class="form-control" name="us_no" value="{{Auth::user()->us_no}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="us_alamat" value="{{Auth::user()->us_alamat}}" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection
