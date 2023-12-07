<?php $active = 8; ?>
@extends('admin.layouts.layout')
@section('title', 'New Product')
@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6" style="margin:3% auto;">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Tạo sản phẩm mới</h2>
                        </div>

                        {{-- nếu có error --}}
                        @if (session('errors'))
                            <div class="alert alert-danger">
                                {{ session('errors') }}
                            </div>
                        @endif

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('submitCreateProduct') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="txt-name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="txt-name" name="name"
                                        placeholder="Nhập tên sản phẩm" required pattern="\w.*">
                                </div>

                                <div class="form-group">
                                    <label for="product_price">Giá gốc sản phẩm</label>
                                    <input type="number" class="form-control" id="product_price" name="price"
                                        placeholder="Nhập giá sản phẩm" min="0" required max="999999999999">
                                </div>

                                <div class="form-group">
                                    <label for="image">HÌnh ảnh</label>
                                    <div class="input-group">
                                        <div style="margin:-1% 0 2% 0;" class="show_image">
                                            <span style='color:#dc3545;'><strong>Chưa có hình ảnh để hiển
                                                    thị</strong></span>
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
                                    <label for="editor">Mô tả sản phẩm</label>
                                    <textarea name="decription" id="editor" placeholder="Tùy chọn" cols="30" rows="10" class="form-control"
                                        style="min-height: 120px;max-height:300px;" pattern="\w.*"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="categories">Loại thức ăn</label>
                                    <select name="category_id" class="form-control form-select" required id="categories"
                                        required>
                                        <option value="" disabled selected>Lựa chọn của bạn (bắt buộc)</option>
                                        @if (!empty($categories))
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }} &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nguồn nhập hàng: &nbsp; {{ $category->relatedGoods->goods_from }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="events">Áp dụng sự kiện</label>
                                    <select name="event_id" class="form-control form-select" id="events">
                                        <option value="" disabled selected>Lựa chọn của bạn (tùy chọn)</option>
                                        @if (!empty($events))
                                            @foreach ($events as $event)
                                                <option value="{{ $event->id }}">{{ $event->name }}</option>
                                            @endforeach
                                        @endif
                                        <option value="">{{ 'Ko có sự kiện nào' }}</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </form>
                    </div>
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

        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
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

@section('create_goods')
    <script src="{{ asset('admin_js/create_goods.js') }}"></script>
@endsection
