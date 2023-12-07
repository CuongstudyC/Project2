<?php $active = 15; ?>
@extends('admin.layouts.layout')
@section('title', 'List Staff')
@section('main_content')
    <div class="row">
        <div class="col-md-4" style="text-align: center;">
            <h1>Danh sách Nhân viên</h1>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-2">
        <form action="{{ route('searchAdmin') }}" method="post">
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
            <th>Họ tên đầy đủ</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Vị trí</th>
            <th>Ngày tạo tài khoản</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            {{-- <form action='{{ url("admin/manage_admin/edit/$admin->id") }}' method="post">
                @csrf --}}
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->full_name}}</td>
                    <td>{{ $admin->user_name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td><select name="position" class="form-control">
                        <option value="{{ $admin->position }}">{{ $admin->position }}</option>
                        </select></td>
                    <td>{{ $admin->created_at }}</td>

                    <td>
                        {{-- <button class="btn btn-info btn-sm" type="submit"><i class="fas fa-pencil-alt"></i> Cập nhật vị trí</button> --}}
                        <a class="btn btn-danger btn-sm" href='{{ url("admin/manage_admin/delete/$admin->id") }}'
                            onclick='return confirm("Bạn có chắc muốn xóa không?")'>
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                    </td>
                </tr>
            {{-- </form> --}}
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
