<?php $active = 16; ?>
@extends('admin.layouts.layout')
@section('title', 'Update Myself')
@section('main_content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6" style="margin:10% auto;">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Cập nhật thông tin cá nhân</h2>
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
                        <form role="form" action="{{ route('submitUpdateAdmin') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="full_name">Tên đầy đủ</label>
                                    <input id="full_name" type="text" class="form-control" autofocus
                                        value="{{ $admin->full_name }}" name="full_name" pattern="\w.*">
                                </div>
                                <div class="form-group">
                                    <label for="name_admin">Tên người dùng</label>
                                    <input id="name_admin" type="text" class="form-control" autofocus
                                        value="{{ $admin->user_name }}" name="name" pattern="\w.*">
                                </div>

                                <div class="form-group">
                                    <label for="email_admin">Email</label>
                                    <input id="email_admin" type="email" class="form-control" autofocus
                                        autocomplete="email" value="{{ $admin->email }}" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="image">HÌnh ảnh</label>
                                    <div class="input-group">
                                        <div style="margin:-1% 0 2% 0;" class="show_image">
                                            @if (!empty($admin->image))
                                                <img src='{{ asset("avatar_admin/$admin->image") }}' alt="" width="300px;"
                                                    height="200px;">
                                            @else
                                                <span style='color:#dc3545;'><strong>Chưa có hình ảnh để hiển
                                                        thị</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Chọn hình ảnh</label>

                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="noImage" name="notUseImage" value="not">
                                        <label for="noImage">Áp dụng ko để hình ảnh</label>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $admin->id }}">
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
    <script src="{{ asset('admin_js/updateMyself.js') }}"></script>
@endsection
