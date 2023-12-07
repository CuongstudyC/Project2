@extends('admin.layouts.app_admin')
@section('title','Đăng ký')
@section('content_pageAdmin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Đăng ký') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('submitRegister') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="full_name" class="col-md-4 col-form-label text-md-end">{{ __('Tên đầy đủ') }}</label>

                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control" autofocus
                                       value="@if(session('fullname')) {{ session('fullname')}}  @endif"  name="full_name" required pattern="\w.*">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tên người dùng') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" autofocus required name="name"
                                        value="@if(session('name')) {{ session('name') }} @endif" pattern="\w.*">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @if(session('email')) is-invalid @endif" required autocomplete="email" name="email"
                                       value="@if(session('email')) {{ session('email') }} @endif">

                                    @if(session('error_email'))
                                    <span class="customer-alert" role="alert" style="color:#dc3545;">
                                        <strong>{{ session('error_email') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" required autocomplete="password" name="password" required pattern="\w.*">

                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Xác nhận mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                                  name="con_pass" pattern="\w.*">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="position" class="col-md-4 col-form-label text-md-end">{{ __('Chức vụ') }}</label>

                            <div class="col-md-6">
                               <select name="position" id="position" class="form-select" required>
                                <option value="" disabled selected>Lựa chọn của bạn</option>
                                {{-- <option value="nhân viên">Nhân Viên</option> --}}
                                <option value="quản lí">Quản lí</option>
                               </select>
                            </div>
                        </div>

                        <div class="row mb-3 display-image">
                            <span class="col-md-4 col-form-label text-md-end custom-file-label">{{ __('Hiển thị avatar') }}</span>
                            <div class="col-md-6" style="padding-top:1%;">
                                <span style='color:#dc3545;'><strong>Chưa có hình ảnh để hiển thị</strong></span>
                            </div>
                        </div>


                        <div class="row mb-3 custom-file">
                            <label for="Image" class="col-md-4 col-form-label text-md-end custom-file-label">{{ __('Chọn avatar') }}</label>
                            <div class="col-md-6">
                                <input id="Image" type="file" class="custom-file-input" name="image">

                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>

                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng ký') }}
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

@section('js_register_for_admin')
    <script src={{ asset('admin_js/register.js') }}></script>
@endsection

