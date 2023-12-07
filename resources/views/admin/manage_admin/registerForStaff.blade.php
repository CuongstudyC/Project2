<?php $active = 17; ?>
@extends('admin.layouts.layout')
@section('title', 'Register Staff')
@section('main_content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6" style="margin:5% auto;">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Đăng ký thành viên</h2>
                        </div>
                        <!-- /.card-header -->

                        {{-- nếu thêm thành công --}}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            <?php if (session('status')) {
                                session()->forget('status');
                            } ?>
                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <!-- form start -->
                        <form role="form" action="{{ route('create_staff') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="full_name">Tên đầy đủ</label>
                                    <input id="full_name" type="text" class="form-control" autofocus name="full_name"
                                        required
                                        value="@if (session('full_name')) {{ session('full_name') }} @endif" pattern="\w.*">
                                </div>
                                <div class="form-group">
                                    <label for="name_admin">Tên người dùng</label>
                                    <input id="name_admin" type="text" class="form-control" autofocus name="name"
                                        required value="@if (session('name')) {{ session('name') }} @endif" pattern="\w.*">
                                </div>

                                <div class="form-group">
                                    <label for="email_admin">Email</label>
                                    <input id="email_admin" type="email"
                                        class="form-control @if (session('email')) is-invalid @endif" autofocus
                                        autocomplete="email" name="email" required
                                        value="@if (session('email')) {{ session('email') }} @endif">
                                </div>

                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input id="password" type="password" class="form-control" autofocus name="password"
                                        required pattern="\w.*">
                                </div>

                                <div class="form-group">
                                    <label for="con-password">Xác nhận mật khẩu</label>
                                    <input id="con-password" type="password" class="form-control" autofocus
                                        name="con-password" required pattern="\w.*">
                                </div>

                                <div class="form-group">
                                    <label for="image">Avatar hiển thị</label>
                                    <div class="input-group">
                                        <div style="margin:-1% 0 2% 0;" class="show_image">
                                            <span style='color:#dc3545;'><strong>Chưa có hình ảnh để hiển
                                                    thị</strong></span>
                                        </div>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Chọn avatar</label>

                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script-section')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection

@section('create_goods')
    <script src="{{ asset('admin_js/create_goods.js') }}"></script>
    <script src="{{ asset('admin_js/registerStaff.js') }}"></script>
    <script>
        setTimeout(() => {
            if (document.querySelector('.alert')) {
                document.querySelector('.alert').remove();
            }
        }, 3000);
    </script>
@endsection
