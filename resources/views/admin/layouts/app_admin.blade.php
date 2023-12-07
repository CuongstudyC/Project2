@php
    use App\Models\admin;
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('admin/login') }}">
                    {{-- {{ config('app.name', 'Admin_Login') }} --}}
                    Admin_Login

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->


                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login_admin') }}">Đăng nhập</a>
                                </li>

                                @php
                                    $admin_manager = admin::where('position','quản lí')->first();
                                @endphp
                                @if(!empty($admin_manager))
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ route('register_admin') }}">Đăng ký</a> --}}
                                    <form action="{{ route('register_admin') }}">
                                    <span class="nav-link" onclick="DisplayEmail()" style="cursor: pointer;">Đăng ký</span>
                                    <input type="email" placeholder="Xác nhận email" class="form-control confirm_email"
                                     autocomplete="email" style="display:none;" name="email">
                                    </form>
                                </li>
                                @else
                                <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register_admin') }}">Đăng ký</a>
                                </li>
                                @endif

                            {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content_pageAdmin')
        </main>
    </div>
</body>
@if(!empty($admin_manager))
<script src="{{ asset('admin_js/confirm_emailManager.js') }}"></script>
@endif
@yield('js_register_for_admin');
@yield('js_login_for_admin');
@yield('js_validateEmail_for_admin')
@yield('js_resetPassword_for_admin')
</html>
