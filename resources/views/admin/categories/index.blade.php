<?php $active = 3; ?>
@extends('admin.layouts.layout')
@section('title', 'List Categories')
@section('main_content')
    <div class="row">
        <div class="col-md-4" style="text-align: center;">
            <h1>Danh sách loại ẩm thực</h1>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-2">
            <form action="{{ route('searchCategories') }}" method="post">
                @csrf
                <div style="display:flex;">
                    <input class="form-control" type="search" placeholder="Tìm Kiếm" aria-label="Search"
                        style="margin-top:2%;" name="search">
                    <button type="submit" class="btn btn-sidebar" style="border:1px solid #ced4da;margin-top:2%;">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

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
    <table class="table table-hover">
        <thead>
            <th>STT</th>
            <th>Tên loại ẩm thực</th>
            <th>Nguồn xuất xứ</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            @foreach ( $cates as $cate )
            <tr>
                <td>{{ $cout++ }}</td>
                <td>{{ $cate->name }}</td>
                <td>{{ $cate->relatedGoods->goods_from }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_{{ $cate->id }}">
                        <i class="fas fa-folder"></i> Chi tiết
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal_{{ $cate->id }}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Chi tiết thể loại ẩm thực</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <!-- Nội dung -->
                                  <table class="table table-hover">
                                    <thead>
                                        <th>ID</th>
                                         <th>Tên loại ẩm thực</th>
                                         <th>Nguồn xuất xứ</th>
                                         <th>Hình ảnh</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $cate->id }}</td>
                                            <td>{{ $cate->name }}</td>
                                            <td>{{ $cate->relatedGoods->goods_from }}</td>
                                            <td><img src='{{ asset("images/".$cate->relatedGoods->image) }}' alt="" width="50px;" height="30px;"></td>
                                        </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(session('Unshow'))
                    <a class="btn btn-info btn-sm" href='{{ url("admin/categories/edit/$cate->id") }}'>
                        <i class="fas fa-pencil-alt"></i> Sửa đổi
                    </a>
                    <a class="btn btn-danger btn-sm" href='{{ url("admin/categories/delete/$cate->id") }}' onclick="return confirm('Bạn có chắc muốn xóa không?')">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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

