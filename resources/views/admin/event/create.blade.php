<?php $active = 6;?>
@extends('admin.layouts.layout')
@section('title', 'New Event')
@section('main_content')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="offset-md-3 col-md-6" style="margin:3% auto;">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">Tạo sự kiên mới</h2>
                            </div>

                            {{-- nếu có error --}}
                            @if(session('errors'))
                            <div class="alert alert-danger">
                                {{session('errors')}}
                            </div>
                            @endif

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('submitCreateEvent') }}" method="post" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="txt-name">Tên sự kiện</label>
                                        <input type="text" class="form-control" id="txt-name" name="name" placeholder="Nhập tên sự kiện" required
                                        value="@if(session('name')){{ session('name') }} @endif" pattern="\w.*">
                                    </div>

                                    <div class="form-group">
                                        <label for="event_code">Mã code sự kiện</label>
                                        <input type="text" class="form-control" id="event_code" name="code" placeholder="Nhập code sự kiện" required
                                        value="@if(session('code')){{ session('code') }} @endif" pattern="\w.*">
                                    </div>

                                    <div class="form-group">
                                        <label for="event_discount">Giảm giá sản phẩm theo %</label>
                                        <input type="number" class="form-control" id="event_discount" name="discount" placeholder="%" required min="0" max="100"
                                        value="@if (session('discount')){{ session('discount') }}@endif">
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>


                                    <div class="form-group">
                                        <label for="event_start">Nhập ngày bắt đầu giảm giá</label>
                                        <input type="date" class="form-control" id="event_start" name="start"  required min="{{ date('Y-m-d') }}"
                                        value="@if (session('start')){{ session('start') }}@endif">
                                    </div>

                                    <div class="form-group">
                                        <label for="event_end">Nhập ngày kết thúc giảm giá</label>
                                        <input type="date" class="form-control" id="event_end" name="end"  required min="{{ date('Y-m-d') }}"
                                        value="@if (session('end')){{ session('end') }}@endif">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                        <input type="radio" class="form-check-input" id="applyForAll" name="check" value="yes" required>
                                        <label for="applyForAll">Áp dụng sự kiện này cho tất cả sản phẩm</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="notApplyForAll" name="check" value="no" required>
                                        <label for="notApplyForAll">Không áp dụng sự kiện này cho tất cả sản phẩm</label>
                                    </div>
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

@section('create_goods')
<script src="{{ asset('admin_js/create_event.js') }}"></script>
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
