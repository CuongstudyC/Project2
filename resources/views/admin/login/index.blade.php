@extends('admin.layouts.app_admin')
@section('title', 'Đăng nhập')
@section('content_pageAdmin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Đăng nhập</div>

                    {{-- nếu thêm thành công --}}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('submitLogin') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="user_name" class="col-md-4 col-form-label text-md-end">Tên người dùng</label>

                                <div class="col-md-6">
                                    <input id="user_name" type="text"
                                        class="form-control @if (session('error_username')) is-invalid @endif" autofocus
                                        value="@if (session('name')) {{ session('name') }} @endif"
                                        name="user_name">

                                    @if (session('error_username'))
                                        <span class="customer-alert" role="alert" style="color:#dc3545;">
                                            <strong>{{ session('error_username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @if (session('error_email')) is-invalid @endif"
                                        name="email"
                                        value="@if (session('email')) {{ session('email') }} @endif" required
                                        autocomplete="email" autofocus>

                                    @if (session('error_email'))
                                        <span class="customer-alert" role="alert" style="color:#dc3545;">
                                            <strong>{{ session('error_email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Mật khẩu</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @if (session('error_password')) is-invalid @endif"
                                        name="password" required autocomplete="current-password"
                                        value="@if (session('password')) {{ session('password') }} @endif">

                                    @if (session('error_password'))
                                        <span class="customer-alert" role="alert" style="color:#dc3545;">
                                            <strong>{{ session('error_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Đăng nhập') }}
                                    </button>
                                    <a class="btn btn-link" href="{{ route('validateForgot') }}">
                                        {{ __('Quên mật khẩu?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_login_for_admin')
    <script src='{{ asset('admin_js/login.js') }}'></script>
    <script>
        setTimeout(() => {
            if (document.querySelector('.alert')) {
                document.querySelector('.alert').remove();
            }
        }, 3000);
    </script>
@endsection
