<?php $active = 14; ?>
@extends('admin.layouts.layout')
@section('title', 'New Report')
@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6" style="margin:10% auto;">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Tạo báo cáo mới</h2>
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

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ url('admin/report/SubmitcreateReport') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="txt-name">Loại báo cáo</label>
                                    <input type="text" class="form-control" id="txt-name" name="type"
                                        placeholder="Nhập loại báo cáo" required pattern="\w.*">
                                </div>
                                <div class="form-group">
                                    <label for="contentReport">Nội dung báo cáo</label>
                                    <textarea  id="contentReport" name="content" cols="30" rows="10" class="form-control" required pattern="\w.*"
                                    style="min-height: 120px;max-height:300px;"></textarea>
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

{{-- @section('create_goods')
    <script src="{{ asset('admin_js/create_goods.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection --}}
