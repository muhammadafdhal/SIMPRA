<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="icon" href="{{ asset('assets/img/stisla-fill.svg') }}">
    <title>Simpra</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>

                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            @if (Auth::user()->us_foto != null)
                            <img alt="image" src="/gambar/fotoMahasiswa/{{Auth::user()->us_foto}}"
                            class="rounded-circle mr-1">
                            @else
                            <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                            @endif
                            
                            <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <a href="/profile" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="/setting" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#">Sistem Informasi PKL</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="#">Simpra</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu</li>
                        <li class="@yield('dashboard')"><a class="nav-link" href="/home"><i class="fas fa-fire"></i>
                                <span>Dashboard</span></a></li>
                        {{-- <li><a class="nav-link" href="/kabkota"><i class="fas fa-fire"></i>
                                <span>Try Country</span></a></li> --}}

                        @if (Auth::user()->us_level == "Admin" || Auth::user()->us_level == "Siswa")

                        @if (Auth::user()->us_level == "Admin")
                        <li class="@yield('siswa')">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fa fa-server"></i> <span>Data Master</span></a>
                            <ul class="dropdown-menu">
                                <li class="@yield('siswa2')"><a class="nav-link" href="/siswa">Data Mahasiswa</a></li>
                                <li class="@yield('pembimbing')"><a class="nav-link" href="/pem">Data Pembimbing</a>
                                </li>
                                <li class="@yield('pkl')"><a class="nav-link" href="/pkl">Daftar Sekolah/Instansi</a>
                                </li>
                            </ul>
                        </li>

                        @endif

                        <li class="@yield('berkas')">
                            <a class="nav-link" href="/berkas">
                                <i class="fa fa-file-alt"></i>
                                <span>Berkas</span>
                            </a>
                        </li>

                        <li class="@yield('status-magang')">
                            <a class="nav-link" href="/md">
                                <i class="fa fa-building"></i>
                                <span>Tempat Magang/PKL</span>
                            </a>
                        </li>

                        <li class="@yield('status-pembimbing-pkl')">
                            <a class="nav-link" href="/pbb">
                                <i class="fa fa-people-carry"></i>
                                <span>Pembimbing</span>
                            </a>
                        </li>


                        </li>
                        @if (Auth::user()->us_level == "Siswa")
                        <li class="@yield('nilai')"><a class="nav-link" href="/nilai2"><i class="fa fa-university"></i>
                                <span>Nilai</span></a>
                        </li>
                        @endif
                        @endif

                        @if (Auth::user()->us_level == "Guru")

                        <li class="@yield('status-bimbingan')">
                            <a class="nav-link" href="/pbb">
                                <i class="fa fa-folder"></i>
                                <span>Mahasiswa Bimbingan</span>
                            </a>
                        </li>


                        @endif

                        <li class="@yield('laporan')"><a class="nav-link" href="/laporan"><i class="fa fa-file"></i>
                                <span>Laporan</span></a>
                        </li>

                        @if (Auth::user()->us_level == "Admin")


                        <li class="@yield('nilai')"><a class="nav-link" href="/nilai"><i class="fa fa-university"></i>
                                <span>Nilai</span></a>
                            @endif
                    </ul>

                </aside>
            </div>

            <!-- Main Content -->

            @yield('content')

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2020 <div class="bullet"></div> 
                </div>
                
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>





    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    {{-- //data json untuk memilih kabkota dan kecamatan
    <script type="text/javascript">
        $('#provinsi').on('change', function (e) {
            console.log(e);
            var id_provinsi = e.target.value;
            $.get('/json-kabkota?id_provinsi=' + id_provinsi, function (data) {
                console.log(data);
                $('#kabkota').empty();
                $('#kabkota').append(
                    '<option value="0" disable="true" selected="true">=== Pilih Kabupaten/Kota ===</option>'
                );
    
                $('#kec').empty();
                $('#kec').append(
                    '<option value="0" disable="true" selected="true">=== Pilih Kabupaten/Kota Dahulu ===</option>'
                );
    
                $('#villages').empty();
                $('#villages').append(
                    '<option value="0" disable="true" selected="true">=== Select Villages ===</option>');
    
                $.each(data, function (index, kabkotaObj) {
                    $('#kabkota').append('<option value="' + kabkotaObj.id + '">' + kabkotaObj
                        .nama + '</option>');
                })
            });
        });
    
        $('#kabkota').on('change', function (e) {
            console.log(e);
            var id_kabkota = e.target.value;
            $.get('/json-kec?id_kabkota=' + id_kabkota, function (data) {
                console.log(data);
                $('#kec').empty();
                $('#kec').append(
                    '<option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>');
    
                $.each(data, function (index, kecObj) {
                    $('#kec').append('<option value="' + kecObj.id + '">' + kecObj.nama +
                        '</option>');
                })
            });
        });
    
        $('#districts').on('change', function (e) {
            console.log(e);
            var districts_id = e.target.value;
            $.get('/json-village?districts_id=' + districts_id, function (data) {
                console.log(data);
                $('#villages').empty();
                $('#villages').append(
                    '<option value="0" disable="true" selected="true">=== Select Villages ===</option>');
    
                $.each(data, function (index, villagesObj) {
                    $('#villages').append('<option value="' + villagesObj.id + '">' + villagesObj
                        .name + '</option>');
                })
            });
        });
    
    </script> --}}


    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });

    </script>

    <!-- Page Specific JS File -->



</body>

</html>
