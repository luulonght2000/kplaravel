@extends("layouts.master")

@section('master_content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class=" container-fluid">
        <a class="navbar-brand" href="/">@yield('title', 'Home')</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Nóng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mới</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Chủ đề
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Thể thao</a></li>
                        <li><a class="dropdown-item" href="#">Du lịch </a></li>
                        <li><a class="dropdown-item" href="#">Đời sống </a></li>
                        <li><a class="dropdown-item" href="#">Quốc phòng</a></li>
                        <li><a class="dropdown-item" href="#">Kinh tế</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    @if(Auth::check())
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Xin chào: {{Auth::user()->name}}
                    </a>
                    @else
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tài khoản
                    </a>
                    @endif
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::check())
                        <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-user"></i> LogOut</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{route('auth.login')}}">Login</a></li>
                        @endif
                        @if(Auth::check())
                        <li><a class="dropdown-item" href="{{route('auth.login')}}">Thông tin</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                        @endif
                    </ul>
                </li>
                @if (Auth::check())
                <div>
                    @if( Auth::user()->is_admin == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('post.index')}}">Admin</a>
                    </li>
                    @elseif( Auth::user()->is_admin == 0)

                    @endif
                </div>
                @endif
            </ul>

            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

@yield('content')

@endsection