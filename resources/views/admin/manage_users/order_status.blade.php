<?php $active = 11; ?>

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
@section('title', 'List Status Orders')
@section('main_content')
    <style>
        .table td {
            vertical-align: middle;
        }
        .table td input,
        .table td input:focus,
        .order_ID,
        .order_ID:focus {
            border: none;
            background: none;
            outline: none;
        }
        .fail{
            display:none;
        }
    </style>
    <div class="row">
        <div class="col-md-6" style="text-align: center;">
            <h1>Danh sách trạng thái đơn hàng</h1>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-2">
            <form action="{{ route('searchShipping') }}" method="post">
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

    <table class="table table-hover table-striped table-bordered">
        <thead>
            <th>ID đặt hàng</th>
            <th>SĐT của khách hàng</th>
            <th>Phương tiện giao hàng</th>
            <th>Phí giao hàng</th>
            <th>Trạng thái giao hàng</th>
            <th>Tên khách hàng</th>
            <th>Ngày giao hàng</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            @foreach ($shipping_orders as $ship)
                <form action='{{ url("admin/manage_users/updateShipping/$ship->id") }}' method="post">
                    @csrf
                    <tr>
                        <td>{{ $ship->relatedOrder->id }}</td>
                        <td><input type="tel" value="{{ $ship->phone }}" pattern="\d{8,12}" name="phone" readonly>
                        </td>
                        <td><input type="text" name="type" value="{{ $ship->type }}" readonly></td>
                        <td><input type="number" min="0" value="{{ $ship->fee }}" name="fee" readonly
                                max="999999999999"></td>
                        <td class="status_order_column" >
                            @if (session('Unshow'))
                                    @if ($ship->status == 'Chưa giao hàng')
                                    <select name="status" class="order_status" required data-status= "{{ $ship->id }}" style="color:#747d8c;">
                                        <option value="{{ $ship->status }}" style="color:#747d8c;">{{ $ship->status }}
                                        </option>
                                        <option value="Đang giao hàng" style="color:black;">Đang giao hàng</option>
                                        <option value="Giao hàng thành công" style="color:#2ed573;">Giao hàng thành công
                                        </option>
                                        <option value="Giao hàng thất bại" style="color:#ff4757;">Giao hàng thất bại
                                        </option>
                                    </select>
                                    @elseif ($ship->status == 'Đang giao hàng')
                                    <select name="status" class="order_status" required data-status= "{{ $ship->id }}" style="color:black;">
                                        <option value="{{ $ship->status }}" style="color:black;">{{ $ship->status }}
                                        </option>
                                        <option value="Giao hàng thành công" style="color:#2ed573;">Giao hàng thành công
                                        </option>
                                        <option value="Giao hàng thất bại" style="color:#ff4757;">Giao hàng thất bại
                                        </option>
                                    </select>
                                    @elseif ($ship->status == 'Giao hàng thành công')
                                    <select name="status" class="order_status" required data-status= "{{ $ship->id }}" style="color:#2ed573;">
                                        <option value="{{ $ship->status }}" style="color:#2ed573;">{{ $ship->status }}
                                        </option>
                                    </select>
                                    @else
                                    <select name="status" class="order_status" required data-status= "{{ $ship->id }}" style="color:#ff4757;">
                                        <option value="{{ $ship->status }}" style="color:#ff4757;">{{ $ship->status }}
                                        </option>
                                </select>
                            @endif
                        @else
                            <select name="status" class="order_status">
                                <option value="{{ $ship->status }}">{{ $ship->status }}</option>
                            </select>
                        @endif
                        <div class="box_fail" data-boxfail= {{ $ship->id }}>
                        <select class="fail" name="confirm_reason" style="margin-top:5px;@if($ship->status == "Giao hàng thất bại")display:block;@endif" data-fail= "{{ $ship->id }}"
                            @if($ship->status == "Giao hàng thất bại") required @endif>
                            @if(!empty($ship->reason_fail))
                            @if($ship->reason_fail == "Khách hàng đã thanh toán")
                            <option value="Khách hàng đã thanh toán">Khách hàng đã thanh toán</option>

                            @elseif ($ship->reason_fail == "Khách hàng chưa thanh toán")
                            <option value="Khách hàng chưa thanh toán">Khách hàng chưa thanh toán</option>
                            @endif
                            @else
                            <option value="" disabled selected>Bạn vui lòng xác nhận</option>
                            <option value="Khách hàng đã thanh toán">Khách hàng đã thanh toán</option>
                            <option value="Khách hàng chưa thanh toán">Khách hàng chưa thanh toán</option>
                            @endif
                        </select>
                    </div>
                 </td>
            <td>
                <select name="order_id" class="order_ID">
                    <option value="{{ $ship->order_id }}">{{ $ship->relatedOrder->name }}</option>
                </select>
            </td>
            <td><input type="date" value="{{ $ship->date }}" name="date_start" readonly>
            </td>
            <td>
                <!-- Modal -->
                <div class="modal fade" id="myModal_{{ $ship->id }}">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Chi tiết thông tin khách hàng cần giao</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <!-- Nội dung -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        ID khách đặt hàng:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $ship->relatedOrder->id }}
                                    </div>
                                    <div class="col-md-6">
                                        Tên khách hàng:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $ship->relatedOrder->name }}
                                    </div>
                                    <div class="col-md-6">
                                        Số điện thoại:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $ship->relatedOrder->phone }}
                                    </div>
                                    <div class="col-md-6">
                                        Địa chỉ:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $ship->relatedOrder->address }}
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        Thành tiền sản phẩm:
                                    </div>
                                    <div class="col-md-6">
                                        {{ formatNumber($ship->relatedOrder->total) }}
                                    </div>
                                    <div class="col-md-6">
                                        Phí vận chuyển:
                                    </div>
                                    <div class="col-md-6">
                                        {{ formatNumber($ship->fee) }}
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Tổng tiền:</strong>
                                    </div>
                                    <div class="col-md-6">
                                        {{ formatNumber($ship->relatedOrder->total + $ship->fee) }}
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#myModal_{{ $ship->id }}" style="width:100%;"> <i class="fas fa-folder"></i>Chi
                    tiết</button><br>
                @if (session('Unshow'))
                    <button class="btn btn-info btn-sm" type="submit" data-updated = "{{  $ship->id }}"
                        style="margin-top:1%;margin-bottom:1%;width:max-content;height:50%;"><i
                            class="fas fa-pencil-alt"></i> Sửa đổi</button>
                    {{-- <br>
                    <a class="btn btn-danger btn-sm" href='{{ url("admin/manage_users/delete_status/$ship->id") }}'
                        onclick='return confirm("Bạn có chắc muốn xóa không?")' style="width:100%;">
                        <i class="fas fa-trash"></i> Xóa
                    </a> --}}
                @endif
            </td>
            </tr>
            </form>
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

@section('script-section')
    <script src="{{ asset('admin_js/status.js') }}"></script>
@endsection
