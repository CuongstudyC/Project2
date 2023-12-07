<?php $active = 1; ?>
@extends('admin.layouts.layout')
@section('title', 'Update Goods')
@section('main_content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6" style="margin:10% auto;">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Cập nhật nguồn xuất xứ</h2>
                        </div>


                            {{-- nếu có error --}}
                            @if (session('errors'))
                            <div class="alert alert-danger">
                                {{ session('errors') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('submitUpdate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="txt-name">Tên nước xuất xứ</label>
                                    <input type="text" class="form-control" id="txt-name" name="name" required
                                        value="{{ $good->goods_from }}" pattern="\w.*">
                                </div>

                                <div class="form-group">
                                    <label for="image">HÌnh ảnh</label>
                                    <div class="input-group">
                                        <div style="margin:-1% 0 2% 0;" class="show_image">
                                         <img src='{{ asset("images/$good->image") }}' alt="" width="300px;" height="200px;">
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
                                    <input type="hidden" name="id" value="{{ $good->id }}">
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
@endsection

@section('timing-status')
    <script>
        setTimeout(() => {
            if (document.querySelector('.alert')) {
                document.querySelector('.alert').remove();
            }
        }, 3000);
    </script>
@endsection
