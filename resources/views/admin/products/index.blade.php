<?php $active = 7; ?>

@php
function formatNumber($product)
{
    if ($product != 0) {
        $sum_total = (string) $product;
        $charSum = str_split($sum_total);
        $sum_total = '';
        $a = 1;
        $dem = 0;
        for ($i = count($charSum) - 1; $i >= 0; $i--) {
            if ($dem == 3 * $a) {
                $sum_total = $sum_total . '.' . $charSum[$i];
                $a += 1;
            } else {
                $sum_total = $sum_total . $charSum[$i];
            }
            $dem += 1;
        }
        $charSum = str_split($sum_total);
        $sum_total = '';
        for ($i = count($charSum) - 1; $i >= 0; $i--) {
            $sum_total = $sum_total . $charSum[$i];
        }
        return $sum_total;
    }
    return 0;
}
@endphp
@extends('admin.layouts.layout')
@section('title', 'List Products')
@section('main_content')
    <div class="row">
        <div class="col-md-5" style="text-align: center;">
            <h1>Danh sách sản phẩm</h1>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <form action="{{ route('searchProduct') }}" method="post">
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
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá gốc sản phẩm</th>
            <th>Thể loại</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            @foreach ( $products as $product )
            <tr>
                <td>{{ $cout++ }}</td>
                <td>{{ $product->name }}</td>
                @if (isset($product->image))
                <td><img src='{{ asset('images/'.$product->image) }}' alt="" width="60px;" height="40px;"></td>
                @else
                <td><img src='{{ asset('images/product_noImage.png') }}' alt="" width="60px;" height="40px;"></td>
                @endif
                <td>{{ formatNumber($product->price) }}</td>
                <td>{{ $product->relatedCategory->name }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_{{ $product->id }}">
                        <i class="fas fa-folder"></i> Chi tiết
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal_{{ $product->id }}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Chi tiết sản phẩm</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <!-- Nội dung -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            ID:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $product->id }}
                                        </div>

                                        <div class="col-md-6">
                                            Tên sản phẩm:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $product->name }}
                                        </div>

                                        <div class="col-md-6">
                                            Giá gốc sản phẩm:
                                        </div>
                                        <div class="col-md-6">
                                            {{ formatNumber($product->price) }}
                                        </div>

                                        <div class="col-md-6">
                                            Giá hiện tại:
                                        </div>
                                        <div class="col-md-6">
                                            {{ formatNumber($product->subPrice) }}
                                        </div>
                                        <div class="col-md-6">
                                            Loại thức ăn
                                        </div>
                                        <div class="col-md-6">
                                            {{ $product->relatedCategory->name }}
                                        </div>

                                        <div class="col-md-6">
                                            Giảm giá theo sự kiện:
                                        </div>
                                        <div class="col-md-6">
                                            @if (isset($product->relatedEvents->name))
                                            {{ $product->relatedEvents->name }}
                                            @else
                                            {{ "Không có sự kiện nào" }}
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            Mô tả sản phẩm
                                        </div>
                                        <div class="col-md-6">
                                            @if (!empty($product->decription))
                                            {{ $product->decription }}
                                            @else
                                            {{ "không có mô tả nào" }}
                                            @endif
                                        </div>
                                      </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(session('Unshow'))
                    <a class="btn btn-info btn-sm" href='{{ url("admin/products/edit/{$product->id}") }}'>
                        <i class="fas fa-pencil-alt"></i> Sửa đổi
                    </a>
                    <a class="btn btn-danger btn-sm" href='{{ url("admin/products/delete/{$product->id}") }}' onclick="return confirm('Bạn có chắc muốn xóa không?')">
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

