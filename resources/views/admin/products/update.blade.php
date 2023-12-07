<?php $active = 7;?>
@extends('admin.layouts.layout')
@section('title', 'Update Product')
@section('main_content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary" style="margin:10% auto;">
                    <div class="card-header">
                        <h2 class="card-title">Cập nhật Sản phẩm</h2>
                    </div>

                    {{-- nếu có error --}}
                    @if(session('errors'))
                    <div class="alert alert-danger">
                        {{session('errors')}}
                    </div>
                    @endif

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('submitUpdateProduct') }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt-name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="txt-name" name="name" placeholder="Nhập tên sản phẩm" required
                               value="{{ $product->name }}" pattern="\w.*" >
                            </div>

                            <div class="form-group">
                                <label for="product_price">Giá gốc sản phẩm</label>
                                <input type="number" class="form-control" id="product_price" name="price" placeholder="Nhập giá sản phẩm" min="0" required
                               value="{{ $product->price }}" max="999999999999">
                            </div>

                            <div class="form-group">
                                <label for="image">HÌnh ảnh</label>
                                <div class="input-group">
                                    <div style="margin:-1% 0 2% 0;" class="show_image">
                                        @if (!empty($product->image))
                                        <img src='{{ asset("images/$product->image") }}' alt="" width="300px;" height="200px;">
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
                                <label for="editor">Mô tả sản phẩm</label>
                                <textarea name="decription" id="editor" placeholder="Tùy chọn" cols="30" rows="10" class="form-control"
                                style="min-height: 120px;max-height:300px;" pattern="\w.*">@if(!empty($product->decription)){{ $product->decription }}@endif</textarea>
                            </div>

                            <div class="form-group">
                                <label for="categories">Loại thức ăn</label>
                              <select name="category_id" class="form-control form-select" required id="categories" required>
                                <option value="{{ $product->category_id }}">{{ $product->relatedCategory->name }}</option>
                               @if(!empty($categories))
                                @foreach ($categories as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="events">Áp dụng sự kiện</label>
                              <select name="event_id" class="form-control form-select" id="events">
                                @if(!empty($product->event_id))
                                <option value="{{ $product->event_id }}">{{ $product->relatedEvents->name }}</option>
                                @else
                                <option value="">{{ "Ko có sự kiện nào" }}</option>
                                @endif
                                @if(!empty($events))
                                @foreach ($events as $event )
                                <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                                @endif
                              </select>
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

        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection

@section('create_goods')
    <script src="{{ asset('admin_js/create_goods.js') }}"></script>
@endsection
