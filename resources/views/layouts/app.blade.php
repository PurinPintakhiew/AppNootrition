<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>App</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <!-- Styles -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css?v=999') }}">
    <style>
        .dropdown-item:hover{
            background-color :#AFAFAF;
        }
        .navbar{
            background-color: #c4e4ff;
        }
        .nav-link-color{
        color:#000000;
        }
        .nav-link-color:hover{
            background-color:#000000;
            color:#FFFFFF;
        }
        .nav-link-color:active{
            background-color:#949393;
            color:#000000;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light backgrund-bar shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img width="170" height="45" class="d-inline-block align-text-top"
                        src="{{ asset('image/logo.png') }}" alt="Logo">
                </a>
                <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
                <a class="searchButton nav-link" href="#">
                  <span data-feather="users"></span> -->

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark rounded" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark rounded" href="{{ route('register') }}">{{ __('ลงทะเบียน') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item ">
                                <div class="me-2 d-flex">
                                    @csrf
                                    <input class="form-control me-2" type="search" placeholder="ค้นหาอุปกรณ์"
                                        aria-label="Search" id="search" ondragenter="search()">
                                    <button class="btn btn-outline-dark" type="submit" onclick="search()">ค้นหา</button>
                                </div>
                            </li>
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i i class="fa fa-user fa-lg mr-2"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-hover dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        {{ __('Setting') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        let name = document.getElementById('search');

        function search() {
            if (name.value != "") {
                window.location.href = "{{ url('eqsearch') }}/" + name.value
            } else {
                alert("กรอกข้อมูลด้ว เย็ดแม่มม 🖕!!")
            }

        }

        name.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                search();
            }
        });
    </script>
</body>

</html>
