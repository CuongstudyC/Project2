@extends('admin.layouts.app_admin')
@section('title','Xác nhận email')
@section('content_pageAdmin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Khôi phục tài khoản') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('submitEmailForgot') }}">
                        @csrf
                        @if (session('error_all'))
                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-6 error_all">
                                    <span class="customer-alert" role="alert" style="color:#dc3545;">
                                        <strong>{{ session('error_all') }}</strong>
                                    </span>

                            </div>
                        </div>
                        @endif
                        <div class="row mb-3">
                            <label for="user_name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Tên người dùng') }}</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text"
                                    class="form-control @if (session('error_name')) is-invalid @endif"
                                    name="user_name" value="@if (session('name')) {{ session('name') }} @endif"
                                    required autocomplete="name" autofocus pattern="\w.*">

                                @if (session('error_name'))
                                    <span class="customer-alert" role="alert" style="color:#dc3545;">
                                        <strong>{{ session('error_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Địa chỉ Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @if (session('error_email')) is-invalid @endif" name="email"
                                    value="@if (session('email')) {{ session('email') }} @endif" required
                                    autocomplete="email" autofocus>

                                @if (session('error_email'))
                                    <span class="customer-alert" role="alert" style="color:#dc3545;">
                                        <strong>{{ session('error_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Xác nhận') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js_validateEmail_for_admin')
    <script src="{{ asset('admin_js/validateEmail.js') }}"></script>
@endsection
