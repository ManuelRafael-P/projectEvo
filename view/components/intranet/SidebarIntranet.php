<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="assets/images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assets/images/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo ($_SESSION['user_info']['user_full_name']); ?></a>
            </div>
        </div>
        <div class="my-2">
            <a href="?c=security&a=logOut">
                <button type="button" class="btn btn-block btn-danger btn-xs" style="font-size: 1.5rem;"><i class="fas fa-door-open"></i></button>
            </a>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="?c=Color&a=adminColor" id="adm-col" class="nav-link">
                        <i class="fas fa-tint mx-2"></i>
                        <p>Colores</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?c=ProductCategory&a=adminProductCategory" id="adm-pro-cat" class="nav-link">
                        <i class="fas fa-copyright mx-2"></i>
                        <p>Categorias de productos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?c=OrderDetail&a=adminOrderDetail" id="adm-ord-det" class="nav-link">
                        <i class="far fa-file-alt mx-2"></i>
                        <p>Detalle de orden</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?c=SaleDetail&a=adminSaleDetail" id="adm-sal-det" class="nav-link">
                        <i class="fas fa-paste mx-2"></i>
                        <p>Detalle de ventas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?c=Product&a=adminProduct" id="adm-pro" class="nav-link">
                        <i class="fas fa-apple-alt mx-2"></i>
                        <p>Productos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?c=RestPswd&a=adminRestPswd" id="adm-rest" class="nav-link">
                        <i class="fas fa-shield-alt mx-2"></i>
                        <p>Tokens de seguridad</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?c=Sale&a=adminSale" id="adm-sal" class="nav-link">
                        <i class="fas fa-shopping-cart mx-2"></i>
                        <p>Ventas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?c=UserSis&a=adminUserSis" id="adm-use" class="nav-link">
                        <i class="fas fa-users mx-2"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>