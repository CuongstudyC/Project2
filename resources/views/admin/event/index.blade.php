<?php $active = 5; ?>
@extends('admin.layouts.layout')
@section('title', 'List Events')
@section('main_content')
    <div class="row">
        <div class="col-md-5" style="text-align: center;">
            <h1>Danh sách sự kiện giảm giá</h1>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <form action="{{ route('searchEvent') }}" method="post">
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
            <th>Tên sự kiện</th>
            <th>Giá sản phẩm giảm</th>
            <th>Ngày bắt đầu giảm</th>
            <th>Ngày kết thúc</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            @foreach ( $events as $event )
            <tr>
                <td>{{ $cout++ }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->discount }}%</td>
                <td>{{ $event->time_start }}</td>
                <td>{{ $event->time_end }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_{{ $event->id }}">
                        <i class="fas fa-folder"></i> Chi tiết
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal_{{ $event->id }}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Chi tiết sự kiên giảm giá</h4>
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
                                        {{ $event->id }}
                                    </div>

                                    <div class="col-md-6">
                                        Tên sự kiện:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $event->name }}
                                    </div>

                                    <div class="col-md-6">
                                        Mã code sự kiện:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $event->code }}
                                    </div>

                                    <div class="col-md-6">
                                        Giá sản phẩm giảm:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $event->discount }}%
                                    </div>

                                    <div class="col-md-6">
                                        Ngày bắt đầu:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $event->time_start }}
                                    </div>

                                    <div class="col-md-6">
                                        Ngày kết thúc:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $event->time_end }}
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
                    <a class="btn btn-info btn-sm" href='{{ url("admin/event/edit/{$event->id}") }}'>
                        <i class="fas fa-pencil-alt"></i> Sửa đổi
                    </a>
                    <a class="btn btn-danger btn-sm" href='{{ url("admin/event/delete/{$event->id}") }}' onclick="return confirm('Bạn có chắc muốn xóa không?')">
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

