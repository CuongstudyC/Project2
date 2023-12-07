<?php $active = 13; ?>
@extends('admin.layouts.layout')
@section('title', 'List Reports')
@section('main_content')
    <div class="row">
        <div class="col-md-4" style="text-align: center;">
            <h1>Danh sách Báo cáo</h1>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-2">
        <form action="{{ route('searchReport') }}" method="post">
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

    <table class="table table-hover table-striped table-bordered">
        <thead>
            <th>STT</th>
            <th>Loại báo cáo</th>
            <th>Nội dung</th>
            <th>Người báo cáo</th>
            <th>Ngày tạo báo cáo</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $cout++ }}</td>
                    <td>{{ $report->type }}</td>
                    <td>{{ $report->content }}</td>
                    <td>{{ $report->relatedAdmin->user_name }}</td>
                    <td>{{ $report->created_at }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_{{ $report->id }}">
                            <i class="fas fa-folder"></i> Chi tiết
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal_{{ $report->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Chi tiết thông tin người báo cáo</h4>
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
                                            {{ $report->relatedAdmin->id }}
                                        </div>

                                        <div class="col-md-6">
                                            Tên đầy đủ nhân viên:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $report->relatedAdmin->full_name }}
                                        </div>

                                        <div class="col-md-6">
                                            Tên sử dụng:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $report->relatedAdmin->user_name }}
                                        </div>

                                        <div class="col-md-6">
                                            Email nhân viên:
                                        </div>
                                        <div class="col-md-6">
                                            {{ $report->relatedAdmin->email }}
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
                        <a class="btn btn-danger btn-sm" href='{{ url("admin/report/delete/$report->id") }}'
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
