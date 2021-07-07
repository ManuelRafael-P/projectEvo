<section class="colored-section" id="title">
    <div id ="navbar_div" class="container-fluid-navbar">
    <!-- Nav Bar -->

    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent text-white">

    <a id="monnijeans-brand" class="navbar-brand " href="?c=main&a=Index">Monnijeans</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

  <ul class="navbar-nav ml-auto">

  <li id="links" class="nav-item active mx-2  navitm">
        <a class="nav-link text-white navitemstyle" href="?c=main&a=Index">Inicio</a>
     </li>
    <li id="links" class="nav-item mx-2  navitm">
        <a class="nav-link text-white navitemstyle" href="?c=main&a=productCatalog">Productos</a>
    </li>
    <li id="links" class="nav-item mx-2  navitm">
        <a class="nav-link text-white navitemstyle" href="?c=main&a=AboutUs">Nosotros</a>
    </li>
    <li id="links" class="nav-item mx-2  navitm">
        <a class="nav-link text-white navitemstyle" href="?c=main&a=Contact">Contacto</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
                <?php
                if (isset($_SESSION['user_info'])) {
                ?>
                    <li id="links" class="nav-item mx-6">
                        <a class="nav-link text-white ses" href="?c=main&a=myOrderHistory">Mis pedidos</a>
                    </li>
                    <li id="links" class="nav-item mx-6">
                        <a class="nav-link text-white ses" href="?c=main&a=updateUserClient"><?php print_r($_SESSION['user_info']['user_full_name']); ?></a>
                    </li>
                    <li id="links" class="nav-item mx-6">
                        <a class="nav-link text-white ses" name="cerrar" href="?c=security&a=logOut">Cerrar sesion</a>
                    </li>
                <?php
                } else {
                ?>
                    <li id="links" class="nav-item">
                        <a class="nav-link text-white ses" href="?c=security&a=loginPage">Iniciar sesion</a>
                    </li>
                <?php
                }
                ?>

                <li id="links" class="nav-item">
                    <a id="esp" class="nav-link text-white" href="?c=main&a=listCartProducts">
                        <i class="fas fa-shopping-cart text-white">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "<span>$count</span>";
                            } else {
                                echo '<span>0</span>';
                            }?>
                        </i>
                    </a>
                </li>
            </ul>

    </div>
    </nav>
    </div>
</section>





