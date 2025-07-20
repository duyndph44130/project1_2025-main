<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= BASE_URL_ADMIN . '' ?>" class="brand-link text-center">
        <span class="brand-text font-weight-light text-xl">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="./assets/dist/img/user5-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="<?= BASE_URL_ADMIN . '' ?>" class="d-block text-lg">hehe</a>
        </div>
        </div>

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

            <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '' ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Trang chủ
                </p>
            </a>
            </li>

            <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                Danh mục sản phẩm
                </p>
            </a>
            </li>

            <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="nav-link">
                <i class="nav-icon fas fa-dragon"></i>
                <p>
                Sản phẩm
                </p>
            </a>
            </li>

            <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="nav-link">
                <i class="fas fa-file-invoice-dollar"></i>
                <p>
                Đơn hàng
                </p>
            </a>
            </li>

            <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=binh-luan' ?>" class="nav-link">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                Quản lý bình luận
                </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Quản lý tài khoản
                </p>
                <i class="fas fa-angle-left-right"></i>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="nav-link">
                    <i class="nav-icon far fa-user"></i>
                    <p>Tài khoản quản trị</p>
                </a>
                </li>

                <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="nav-link">
                    <i class="nav-icon far fa-user"></i>
                    <p>Tài khoản khách hàng</p>
                </a>
                </li>

            </ul>
            </li>
        </ul>
        </nav>
    </div>
</aside>