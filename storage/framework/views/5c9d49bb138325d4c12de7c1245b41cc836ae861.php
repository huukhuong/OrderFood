<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="img/users/<?php echo e(auth()->user()->img); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(auth()->user()->name); ?></a>
                <a href="admin/logout" class="d-block">Đăng xuất</a>
            </div>
        </div>

        <!-- Sidebar Menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="./admin" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Trang chủ
                        </p>
                    </a>
                </li>

                <?php if(auth()->user()->role ==1): ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Quản lý thống kê
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="admin/statistical/dondathang" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thống kê đơn đặt hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/404" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thống kê top sản phẩm bán chạy</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/404" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thống kê doanh thu theo loại</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="admin/category/list" class="nav-link">
                            <i class="nav-icon fas fa-th-list"></i>
                            <p>
                                Quản lý danh mục
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/product/list" class="nav-link">
                            <i class="nav-icon fas fa-hamburger"></i>
                            <p>
                                Quản lý món ăn
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/user/list" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Quản lý người dùng
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->role == 1 || auth()->user()->role == 2): ?>
                <li class="nav-item">
                    <a href="admin/order/list" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Quản lý đơn hàng
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->role ==1): ?>
                <li class="nav-item">
                    <a href="admin/partners/list" class="nav-link">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Quản lý đối tác
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->role == 1 || auth()->user()->role == 3 ): ?>
                    <li class="nav-item">
                        <a href="admin/import/list" class="nav-link">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>
                                Quản lý nhập hàng
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>
                                Quản lý nhà cung cấp
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="admin/supplier/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/supplier/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thêm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/supplier/search" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tìm Kiếm</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
</aside>
<?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/components/menuleft.blade.php ENDPATH**/ ?>