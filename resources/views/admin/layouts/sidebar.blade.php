<?php use App\Models\admin;
use App\Models\admin_remember; ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ url('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Project Demo</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <?php if (session('id')) {
            $id = admin::find(session('id'));
            $position = $id->position;
        }
        $getID = admin_remember::all();
        if (!$getID->isEmpty()) {
            foreach ($getID as $id) {
               $position = $id->relationAdmin->position;
            }
        } ?>
        <div  style="text-indent:20px;color:white;margin-top:10px;">Chức vụ:&nbsp; {{ $position }}</div>


        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if (session('id')) {
                    $id = admin::find(session('id'));
                    if (!empty($id->image)) {
                        $user_image = $id->image;
                    } else {
                        $user_image = 'avatar_mau.jpg';
                    }
                }
                $getID = admin_remember::all();
                if (!$getID->isEmpty()) {
                    foreach ($getID as $id) {
                        if (empty($id->relationAdmin->image)) {
                            $user_image = 'avatar_mau.jpg';
                        } else {
                            if (isset($id->relationAdmin->image)) {
                                $user_image = $id->relationAdmin->image;
                            }
                        }
                    }
                } ?>
                <img src='{{ url("avatar_admin/$user_image") }}' class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="d-block" style="color:white;"><?php if (session('id')) {
                    $id = admin::find(session('id'));
                    $user_name = $id->user_name;
                }
                $getID = admin_remember::all();
                if (!$getID->isEmpty()) {
                    foreach ($getID as $id) {
                        if (isset($id->relationAdmin->user_name)) {
                            $user_name = $id->relationAdmin->user_name;
                        }
                    }
                } ?>{{ $user_name }}</span>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- Dashboard --}}
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Trang chủ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('Dashboard_index') }}"
                                class="nav-link
                                     @if (empty($active)) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tổng doanh thu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Goods: --}}
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                        <i class="nav-icon fa fa-globe"></i>
                        <p>
                            Nguồn nhập hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('goods_index') }}"
                                class="nav-link
                            @if (isset($active)) @if ($active == 1) active @endif @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách nhập hàng</p>
                            </a>
                        </li>
                        @if (session('Unshow'))
                            <li class="nav-item">
                                <a href="{{ route('goods_create') }}"
                                    class="nav-link
                            @if (isset($active)) @if ($active == 2) active @endif @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo nhập hàng mới</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>


                {{-- Categories: --}}
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        {{-- <i class="nav-icon fa fa-wine-glass"></i> --}}
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Thể loại
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories_index') }}"
                                class="nav-link
                            @if (isset($active)) @if ($active == 3) active @endif @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách loại ẩm thực</p>
                            </a>
                        </li>
                        @if (session('Unshow'))
                            <li class="nav-item">
                                <a href="{{ route('Category_create') }}"
                                    class="nav-link
                            @if (isset($active)) @if ($active == 4) active @endif @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo loại ẩm thực mới</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                {{-- Discount: --}}
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        {{-- <i class="nav-icon fa fa-wine-glass"></i> --}}

                        <i class="fa fa-gift nav-icon"></i>
                        <p>
                            Sự kiện giảm giá
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('events_index') }}"
                                class="nav-link
                                            @if (isset($active)) @if ($active == 5) active @endif @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách sự kiện</p>
                            </a>
                        </li>
                        @if (session('Unshow'))
                            <li class="nav-item">
                                <a href="{{ route('event_create') }}"
                                    class="nav-link
                                            @if (isset($active)) @if ($active == 6) active @endif @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo sự kiện</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                {{-- Product: --}}
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="fa fa-tag nav-icon"></i>
                        <p>
                            Sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('products_index') }}"
                                class="nav-link
                                         @if (isset($active)) @if ($active == 7) active @endif @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách sản phẩm</p>
                            </a>
                        </li>
                        @if (session('Unshow'))
                            <li class="nav-item">
                                <a href="{{ route('products_create') }}"
                                    class="nav-link
                                         @if (isset($active)) @if ($active == 8) active @endif @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo sản phẩm mới</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                {{-- Order: --}}
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="fa fa-user nav-icon"></i>
                        <p>
                            Thông tin khách hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (session('Unshow'))
                            <li class="nav-item">
                                <a href="{{ route('users_index') }}"
                                    class="nav-link
                                         @if (isset($active)) @if ($active == 9) active @endif @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách khách hàng</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('users_order') }}"
                                class="nav-link
                                         @if (isset($active)) @if ($active == 10) active @endif @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách đặt hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user_status') }}"
                                class="nav-link
                                         @if (isset($active)) @if ($active == 11) active @endif @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trạng thái đơn hàng</p>
                            </a>
                        </li>
                        @if (session('Unshow'))
                            <li class="nav-item">
                                <a href="{{ route('Shipping_create') }}"
                                    class="nav-link
                                         @if (isset($active)) @if ($active == 12) active @endif @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo trạng thái đơn hàng</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                {{-- Report: --}}
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="fa fa-bookmark nav-icon"></i>
                        <p>
                            Báo cáo
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('report_index') }}"
                                class="nav-link
                                        @if (isset($active)) @if ($active == 13) active @endif @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách báo cáo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('report_create') }}"
                                class="nav-link
                                        @if (isset($active)) @if ($active == 14) active @endif @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo báo cáo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Admin: --}}
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-cog nav-icon"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (session('Unshow'))
                            <li class="nav-item">
                                <a href="{{ route('admin_index') }}"
                                    class="nav-link
                                                    @if (isset($active)) @if ($active == 15) active @endif @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách nhân viên</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register_staff') }}"
                                    class="nav-link
                                                        @if (isset($active)) @if ($active == 17) active @endif @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Đăng ký thành viên</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('admin_update') }}"
                                class="nav-link
                                                    @if (isset($active)) @if ($active == 16) active @endif @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cập nhật cá nhân</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <br><br><br>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
