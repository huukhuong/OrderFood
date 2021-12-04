<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="admin_lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="./admin" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Trang chủ
                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="admin/category/list" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="admin/category/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách thể loại</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin/category/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm thể loại</p>
                            </a>
                        </li>


                    </ul>
                </li>


                <li class="nav-item">
                    <a href="admin/products/list" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="admin/product/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin/product/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm sản phẩm</p>
                            </a>
                        </li>


                    </ul>
                </li>

            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
</aside>
