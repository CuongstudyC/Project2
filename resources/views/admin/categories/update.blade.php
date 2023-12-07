<?php $active = 3;?>
@extends('admin.layouts.layout')
@section('title', 'Update Categories')
@section('main_content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary" style="margin:10% auto;">
                    <div class="card-header">
                        <h2 class="card-title">Cập nhật loại ẩm thực</h2>
                    </div>

                    {{-- nếu có error --}}
                    @if(session('errors'))
                    <div class="alert alert-danger">
                        {{session('errors')}}
                    </div>
                    @endif

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('submitUpdateCategory') }}" method="post" >
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt-name">Tên loại ẩm thực</label>
                                <input type="text" class="form-control" id="txt-name" name="name"
                                 required value="{{ $cate->name }}" pattern="\w.*">
                            </div>

                            <div class="form-group">
                                <label for="goods">Nguồn nhập hàng</label>
                                <select name="goods_id" class="form-select" required id="goods">
                                  <option value="{{ $cate->goods_id }}" selected>{{ $cate->relatedGoods->goods_from }}</option>
                                  @foreach ( $goods as $good )
                                  <option value="{{ $good->id }}">{{ $good->goods_from }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="id" value="{{ $cate->id }}">
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

@section('timing-status')
    <script>
        setTimeout(() => {
            if (document.querySelector('.alert')) {
                document.querySelector('.alert').remove();
            }
        }, 3000);
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
