<?php $active = 4;?>
@extends('admin.layouts.layout')
@section('title', 'New Categories')
@section('main_content')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="offset-md-3 col-md-6" style="margin:10% auto;">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">Tạo loại ẩm thực mới</h2>
                            </div>

                            {{-- nếu có error --}}
                            @if(session('errors'))
                            <div class="alert alert-danger">
                                {{session('errors')}}
                            </div>
                            @endif

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('submitCreateCategory') }}" method="post" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="txt-name">Tên loại ẩm thực</label>
                                        <input type="text" class="form-control" id="txt-name" name="name" placeholder="Nhập loại ẩm thực" required
                                        pattern="\w.*">
                                    </div>
                                        <div class="form-group">
                                            <label for="goods">Nguồn xuất xứ</label>
                                          <select name="goods_id" class="form-control form-select" required id="goods">
                                            <option value="" disabled selected>Lựa chọn của bạn</option>
                                            @foreach ($goods as $good )
                                            <option value="{{ $good->id }}">{{ $good->goods_from }}</option>
                                            @endforeach
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

@section('timing-status')
    <script>
        setTimeout(() => {
            if (document.querySelector('.alert')) {
                document.querySelector('.alert').remove();
            }
        }, 3000);
    </script>
@endsection
