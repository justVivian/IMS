<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PD. Halim | @yield('title')</title>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/favicon_io/apple-touch-icon_2.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('storage/favicon_io/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/favicon_io/favicon-32x32_2.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/favicon_io/favicon-16x16_2.png') }}">
    <link rel="manifest" href="{{ asset('storage/favicon_io/site.webmanifest') }}">

    <style>
        /*
            DEMO STYLE
        */

        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
        body {
            font-family: 'Poppins', sans-serif;
            background: #EFF1F5;
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
            height: fit-content;
        }

        .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            /* box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1); */
        }

        .navbar-horizontal {
            background: transparent;
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #ddd;
            margin: 40px 0;
        }

        /* ---------------------------------------------------
            SIDEBAR STYLE
        ----------------------------------------------------- */

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 999;
            background: #FFFFFF;
            color: #000000;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #fafafa;
        }

        #sidebar ul.components {
            padding: 20px 0;
            /* border-bottom: 1px solid #47748b; */
        }

        #sidebar ul p {
            color: #000000;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            padding-bottom: 20px;
            font-size: 1.1em;
            display: block;
            padding-left: 20px;
        }

        #sidebar ul li a:hover {
            color: #5C89BD;
            font-weight: 600;
            background: #fff;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #5C89BD;
            font-weight: 600;
            background: #FFFFFF;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #FFFFFF;
        }

        ul.CTAs {
            padding: 20px;
        }

        ul.CTAs a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        a.download {
            background: #fff;
            color: #000000;
        }

        a.article,
        a.article:hover {
            background: #FFFFFF !important;
            color: #5C89BD !important;
            font-weight: 600;
        }

        .dropdown-menu {
            min-width:auto;
        }

        .dropdown-toggle.user-dropdown::after {
            right: 0px;
        }

        .user-dropdown[aria-expanded="true"] {
            background-color:transparent;
        }

        /* .user-dropdown {
            padding-left: 1rem;
            padding-right: 1rem;
        } */

        /* ---------------------------------------------------
            CONTENT STYLE
        ----------------------------------------------------- */

        #content {
            width: calc(100% - 250px);
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s;
            position: absolute;
            top: 0;
            right: 0;
        }
        #content.active {
            width: 100%;
        }

        .navbar-brand img {
            max-height: 60px;
        }

        .navbar-horizontal button {
            background: transparent;
        }

        .kolom {
            background: #FFF;
            border-radius: 20px;
            margin-bottom: 25px;
        }

        .kolom-title {
            padding: 20px 40px;
        }

        .kolom-title .page-title {
            font-weight: 500;
            font-size: 24px;
            color: #000000;
        }

        .kolom-content {
            padding: 30px 20px;
            min-height: 550px;
        }

        #search-bar {
            background: #F6F6F6;
            border-radius: 8px;
            width: 267px;
            height: 45px;
            border: none;
            background-image: url('../storage/search-normal.svg'); /* Add a search icon to input */
            background-position: 10px 12px; /* Position the search icon */
            background-repeat: no-repeat; /* Do not repeat the icon image */
            width: 100%; /* Full-width */
            font-size: 16px; /* Increase font-size */
            padding: 12px 20px 12px 40px;
        }

        .btn-custom {
            padding: 12px;
            background: rgba(22, 86, 160, 0.7);
            border-radius: 10px;
            color: #FFFFFF;
            border: none;
        }

        .btn-custom:hover, .btn-custom:active {
            background: rgba(22, 86, 160, 0.9);
        }

        .btn-kembali, .div-simpan{
            width: 30%;
        }
        .btn-kembali {
            padding: 12px;
            border-radius: 10px;
            color: rgba(22, 86, 160, 0.7);
            border: rgba(22, 86, 160, 0.7);
            background : rgba(246, 246, 246, 0.7);
        }
        .btn-kembali:hover, .btn-kembali:active {
            background: rgba(246, 246, 246, 1.0);
            color: #5C89BD;
            border : #494949;
        }
        .div-simpan .btn-custom {
            width: 100%;
        }

        .pagination li a.page-link {
            border: none;
        }
        .page-item.active span.page-link {
            background: #5C89BD;
        }
        .page-item .page-link {
            color: #000000;
            border:none;
        }

        form {
            /* display: flex;
            flex-direction: column; */
        }

        .input-form {
            width: 30%;
        }

        .form-group label {
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;
        }
        @yield('content-css')

        /* ---------------------------------------------------
            MEDIAQUERIES
        ----------------------------------------------------- */
        @media (max-width: 991px) {
            .user-dropdown[aria-expanded="true"]::after {
                top: 20%;
            }
        }
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #sidebarCollapse span {
                display: none;
            }
            .user-dropdown[aria-expanded="true"]::after {
                top: 20%;
            }
            .input-form {
                width: 100%;
            }
            .btn-kembali, .div-simpan{
                width: 100%;
                margin-bottom : 10px;
            }
            .div-simpan .btn-custom {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="wrapper" id="app">
        <nav id="sidebar">
            <!-- <div class="sidebar-header">
                <h3>
                    <a class="navbar-brand" href="/">PD. Halim</a>
                </h3>
            </div> -->

            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p> -->
                @guest
                    <li><a href="{{ route('login') }}">{{ __('Sign In') }}</a></li>
                    <!-- <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li> -->
                @else
                    <li>
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Data Master</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            @can('kategori-list')
                            <li>
                                <a href="/kategori">Kategori</a>
                            </li>
                            @endcan
                            @can('merk-list')
                            <li>
                                <a href="/merk">Merk</a>
                            </li>
                            @endcan
                            @can('size-list')
                            <li>
                                <a href="/size">Size</a>
                            </li>
                            @endcan
                            @can('warna-list')
                            <li>
                                <a href="/warna">Warna</a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @can('barang-list')
                    <li>
                        <a href="/barang">Barang</a>
                    </li>
                    @endcan
                    @can('masuk-list')
                    <li>
                        <a href="/barang-masuk">Stok Barang Masuk</a>
                    </li>
                    @endcan
                    @can('keluar-list')
                    <li>
                        <a href="/barang-keluar">Stok Barang Keluar</a>
                    </li>
                    @endcan
                    @can('retur-list')
                    <li>
                        <a href="/retur">Barang Retur</a>
                    </li>
                    @endcan
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pengguna</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="{{ route('users.index') }}">Manajemen Pengguna</a>
                            </li>
                            @can('role-list')
                            <li>
                                <a href="{{ route('roles.index') }}">Manajemen Pekerja</a>
                            </li>
                            @endcan
                            <!-- <li>
                                <a href="#">Page 2</a>
                            </li>
                            <li>
                                <a href="#">Page 3</a>
                            </li> -->
                        </ul>
                    </li>
                @endguest
            </ul>
        </nav>
        <div id="content">
        <button type="button" id="sidebarCollapse" class="btn" style="background: transparent;">
                        <i class="fas fa-bars"></i>
                        <!-- <span>Toggle Sidebar</span> -->
                    </button>
            <nav class="navbar navbar-expand-lg navbar-horizontal">
                <div class="container">

                  
                    <a class="navbar-brand" href="/"><img src="{{ asset('storage/Logo-PD-Halim.png') }}" alt=""></a>
                    <button class="btn d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-user"></i>
                        <!-- <span>User</span> -->
                    </button>

                    @guest
                    @else
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle user-dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="padding-left: 1rem;padding-right: 1rem;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li> -->
                        </ul>
                    </div>
                    @endguest
                </div>
            </nav>
            <div class="container justify-content-center">
                <div class=" kolom kolom-title">
                    @yield('content-title')
                </div>
                <div class="kolom kolom-content">
                @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- Popper.JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
    <!-- Bootstrap JS -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> -->
    <!-- jQuery Custom Scroller CDN -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script> -->
    <script type="text/javascript">
    $('.delete-confirm').on('click', function (e) {
        e.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Hapus Data',
            text: 'Apakah Anda yakin menghapus data ini?',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

    $(document).ready(function () {
            // $("#sidebar").mCustomScrollbar({
            //     theme: "minimal"
            // });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                // $('a[aria-expanded=false]').attr('aria-expanded', 'true');
            });
            //  // close dropdowns
            // $('.collapse.show').toggleClass('show');
            // // and also adjust aria-expanded attributes we use for the open/closed arrows
            // // in our CSS
            // $('a[aria-expanded=true]').attr('aria-expanded', 'false');

            $('#search-bar').on('keypress', function(e) {
                if(event.key === 'Enter') {
                    event.preventDefault();
                    $('#search-submit').click();
                }
            });
            });
    </script>
</body>
</html>