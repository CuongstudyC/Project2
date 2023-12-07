<?php $active = 1; ?>
@extends('admin.layouts.layout')
@section('title', 'List Goods')
@section('main_content')
    <div class="row">
        <div class="col-md-4" style="text-align: center;">
            <h1>Danh sách nguồn xuất xứ</h1>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-2">
        <form action="{{ route('searchGoods') }}" method="post">
                @csrf
            <div style="display:flex;" >
            <input class="form-control" type="search" placeholder="Tìm Kiếm" aria-label="Search" style="margin-top:2%;" name="search">
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
        <?php if(session('status')){
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
            <th>Tên nước nhập</th>
            <th>Hình ảnh</th>
            @if(session('Unshow'))
            <th>Hành động</th>
            @endif
        </thead>
        <tbody>
            @foreach ($goods as $g)
                <tr>
                    <td>{{ $cout++ }}</td>
                    <td>{{ $g->goods_from }}</td>
                    <td><img src='{{ asset('images/' . $g->image) }}' alt="" width="60px;" height="40px;"></td>
                    <td>
                        @if(session('Unshow'))
                        <a class="btn btn-info btn-sm" href='{{ url("admin/goods/edit/$g->id") }}'>
                            <i class="fas fa-pencil-alt"></i> Sửa đổi
                        </a>
                        <a class="btn btn-danger btn-sm" href='{{ url("admin/goods/delete/$g->id") }}'
                            onclick='return confirm("Bạn có chắc muốn xóa không?")'>
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                    </td>
                    @endif
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
