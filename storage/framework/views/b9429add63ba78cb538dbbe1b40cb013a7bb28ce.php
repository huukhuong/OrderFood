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
                        <i class="nav-icon fas fa-hamburger"></i>
                        <p>
                            Quản lý người dùng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin/order/list" class="nav-link">
                        <i class="nav-icon fas fa-hamburger"></i>
                        <p>
                            Quản lý đặt hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin/partners/list" class="nav-link">
                        <i class="nav-icon fas fa-hamburger"></i>
                        <p>
                            Quản lý đối tác
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
</aside>
<?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/admin/components/menuleft.blade.php ENDPATH**/ ?>