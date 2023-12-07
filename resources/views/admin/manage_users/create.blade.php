<?php $active = 12; ?>
@extends('admin.layouts.layout')
@section('title', 'New Status Order')
@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6" style="margin:3% auto;">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Tạo đơn shipper mới</h2>
                        </div>

                        {{-- nếu có error --}}
                        @if (session('errors'))
                            <div class="alert alert-danger">
                                {{ session('errors') }}
                            </div>
                        @endif

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('submitCreateShipping') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="txt-name">SĐT của khách hàng</label>
                                    <input type="tel" class="form-control" id="txt-name" name="phone" pattern="\d{8,12}"
                                        placeholder="Nhập SĐT khách hàng" required >
                                </div>

                                <div class="form-group">
                                    <label for="type_shipping">Phương tiện giao hàng</label>
                                    <input type="text" class="form-control" id="type_shipping" name="type"
                                        placeholder="Nhập phương tiện giao hàng" required pattern="\w.*">
                                </div>

                                <div class="form-group">
                                    <label for="fee_shipping">Phí giao hàng</label>
                                    <input type="number" class="form-control" id="fee_shipping" name="fee"
                                        placeholder="Nhập phí giao hàng" required min="0" max="999999999999">
                                </div>


                                <div class="form-group">
                                    <label for="status_shipping">Trạng thái giao hàng</label>
                                    <select name="status" id="status_shipping" class="form-control" required>
                                        <option value="" selected disabled>Nhập lựa chọn của bạn</option>
                                        <option value="Chưa giao hàng">Chưa giao hàng</option>
                                        <option value="Đang giao hàng">Đang giao hàng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="order_id_shipping">Tên khách hàng đã đặt hàng</label>
                                    <select name="order_id" required id="order_id_shipping" class="form-control">
                                        <option value="" selected disabled>Nhập lựa chọn của bạn</option>
                                        @foreach ($orders as $order )
                                        <option value="{{ $order->id }}">ID: {{ $order->id }} - {{ $order->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date_shipping">Ngày giao hàng</label>
                                    <input type="date" min="{{ date('Y-m-d') }}" class="form-control" name="date"
                                        id="date_shipping">
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

@section('timing-status')
    <script>
        setTimeout(() => {
            if (document.querySelector('.alert')) {
                document.querySelector('.alert').remove();
            }
        }, 3000);
    </script>
@endsection
