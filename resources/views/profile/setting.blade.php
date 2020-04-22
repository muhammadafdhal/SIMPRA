@extends('template.app')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>General Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                <div class="breadcrumb-item">General Settings</div>
            </div>
        </div>

        <div class="section-body">

            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-12">
                    <form action="/setting/change" method="POST">
                        @csrf
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>Mengubah Password</h4>
                            </div>
                            <div class="card-body">
                                
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Password Lama</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="password" class="form-control" id="passwordlama"
                                        placeholder="Masukan Password lama anda" name="current_password" required>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Password baru</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="password" class="form-control" id="passwordbaru"
                                        placeholder="Masukan Password baru anda" name="new_password" required>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Konfirmasi</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="password" class="form-control" id="konfirmasi"
                                        placeholder="Masukkan sekali lagi password baru anda" name="new_confirm_password" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
                                <a href="/home" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
