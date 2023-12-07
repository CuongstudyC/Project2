<?php $active = 9; ?>
@extends('admin.layouts.layout')
@section('title', 'List Customer')
@section('main_content')
    <div class="row">
        <div class="col-md-6" style="text-align: center;">
            <h1>Danh sách thông tin khách hàng</h1>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-2">
        <form action="{{ route('searchUsers') }}" method="post">
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
            <th>Tên khách hàng</th>
            <th>Email khách hàng</th>
            <th>Avatar khách hàng</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            @foreach ($customers as $cus)
                <tr>
                    <td>{{ $cout++ }}</td>
                    <td>{{ $cus->name }}</td>
                    <td>{{ $cus->email}}</td>
                    <td>
                        @if(!empty($cus->image))
                       <img src='{{ asset("images/".$cus->image) }}' alt="" width="60px;" height="40px;">
                       @else
                       <span style="color:#dc3545;">Không có avatar</span>
                       @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_{{ $cus->id }}">
                            <i class="fas fa-folder"></i> Chi tiết
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal_{{ $cus->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Chi tiết thông tin khách hàng</h4>
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
                                            {{ $cus->id }}
                                        </div>

                                        <div class="col-md-6">
                                            Tên khách hàng:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $cus->name }}
                                        </div>

                                        <div class="col-md-6">
                                            Email khách hàng:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $cus->email }}
                                        </div>

                                        <div class="col-md-6">
                                            Địa chỉ khách hàng:
                                        </div>
                                        <div class="col-md-6">
                                           @if (!empty($cus->address))
                                           {{ $cus->address }}
                                           @else
                                           <span>Bí mật</span>
                                           @endif
                                        </div>

                                        <div class="col-md-6">
                                            SĐT khách hàng:
                                        </div>
                                        <div class="col-md-6">
                                            @if (!empty($cus->phone))
                                            {{ $cus->phone }}
                                            @else
                                            <span>Bí mật</span>
                                            @endif
                                         </div>

                                        <div class="col-md-6">
                                            Ngày tạo tài khoản:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $cus->created_at }}
                                        </div>

                                        <div class="col-md-6">
                                            Ngày cập nhật tài khoản:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $cus->updated_at }}
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
                       {{-- <a class="btn btn-danger btn-sm" href='{{ url("admin/manage_users/delete/$cus->id") }}'
                            onclick='return confirm("Bạn có chắc muốn xóa không?")'>
                            <i class="fas fa-trash"></i> Xóa
                        </a> --}}
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
