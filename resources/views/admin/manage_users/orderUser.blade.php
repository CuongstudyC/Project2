<?php $active = 10; ?>

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
@section('title', 'List Orders')
@section('main_content')
    <div class="row">
        <div class="col-md-6" style="text-align: center;">
            <h1>Danh sách khách hàng đặt hàng</h1>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-2">
        <form action="{{ route('searchOrders') }}" method="post">
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
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>SĐT khách hàng</th>
            <th>Địa chỉ khách hàng</th>
            <th>Tổng tiền thanh toán</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone}}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ formatNumber($order->total) }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_{{ $order->id }}">
                            <i class="fas fa-folder"></i> Chi tiết
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal_{{ $order->id }}">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Chi tiết thông tin từng đơn hàng</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="scrollable-content">
                                        <!-- Nội dung -->
                                      <div class="row mb-3">
                                        <div class="col-md-6">
                                            ID:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $order->id }}
                                        </div>
                                        <div class="col-md-6">
                                            Tên khách hàng:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $order->name }}
                                        </div>

                                        <div class="col-md-6">
                                            SĐT khách hàng:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $order->phone }}
                                        </div>

                                        <div class="col-md-6">
                                            Địa chỉ khách hàng:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $order->address }}
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>

                                        @foreach ( $orders_detail as $detail )
                                        @if ($detail->order_id == $order->id)
                                        <div class="col-md-6">
                                           <strong>Tên sản phẩm:</strong>
                                        </div>
                                        <div class="col-md-6">
                                            {{ $detail->product_name }}
                                        </div>
                                        <div class="col-md-6">
                                            Số lượng:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $detail->product_qty }}
                                        </div>
                                        <div class="col-md-6">
                                            Giá:
                                        </div>
                                        <div class="col-md-6">
                                            {{ formatNumber($detail->product_price) }}
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        @endif
                                        @endforeach
                                        <hr>
                                        <div class="col-md-6">
                                           <strong>Tổng tiền:</strong>
                                        </div>
                                        <div class="col-md-6">
                                            {{ formatNumber($order->total) }}
                                        </div>
                                        {{-- <div class="col-md-6">
                                            Ngày tạo đơn hàng:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $order->created_at }}
                                        </div> --}}
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
                        <a class="btn btn-danger btn-sm" href='{{ url("admin/manage_users/delete_order/$order->id") }}'
                            onclick='return confirm("Bạn có chắc muốn xóa không?")'>
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
