@extends('admin.layouts.app_admin')
@section('title','Tạo lại mật khẩu')
@section('content_pageAdmin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tạo lại mật khẩu') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('submitResetPass') }}">
                        @csrf
                        <input type="hidden" name="id" value="@if(session('id')){{ session('id') }}@endif">

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu mới') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" pattern="\w.*">

                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Xác nhận mật khẩu mới') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" pattern="\w.*">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Khôi phục tài khoản') }}
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

@section('js_resetPassword_for_admin')
    <script src="{{ asset('admin_js/resetPassword.js') }}"></script>

@endsection
