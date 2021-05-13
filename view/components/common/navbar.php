<nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top" style="padding:1em 0;">
    <div class="container">
        <span class="navbar-brand text-white" href="#">Mouri</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="" style="color:white"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li id="links" class="nav-item active">
                    <a class="nav-link text-white" href="?c=main&a=Index">Home</a>
                </li>
                <!-- <li id="links" class="nav-item">
                    <a class="nav-link text-white" href="?c=main&a=Listar_Productos">Productos</a>
                </li> -->
                <li id="links" class="nav-item">
                    <a class="nav-link text-white" href="?c=main&a=AboutUs">Nosotros</a>
                </li>
                <li id="links" class="nav-item">
                    <a class="nav-link text-white" href="?c=main&a=Contact">Contacto</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
                if (isset($_SESSION['info_user'])) {
                ?>
                    <li id="links" class="nav-item mr-3">
                        <a class="nav-link text-white" href="?c=usuario&a=Info_User_Client"><?php print_r($_SESSION['info_user']); ?></a>
                    </li>
                    <li id="links" class="nav-item mr-3">
                        <a class="nav-link text-white" name="cerrar" href="?c=sesion&a=Cerrar_Sesion">Cerrar sesion</a>
                    </li>
                <?php
                } else {
                ?>
                    <li id="links" class="nav-item">
                        <a class="nav-link text-white" href="?c=security&a=loginPage">Iniciar sesion</a>
                    </li>
                <?php
                }
                ?>

                <li id="links" class="nav-item">
                    <a id="esp" class="nav-link text-white" href="?c=sesion&a=Ver_Carrito">
                        <i class="fas fa-shopping-cart text-white">
                            <!-- <?php
                            if (isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "<span>$count</span>";
                            } else {
                                echo '<span>0</span>';
                            } ?> -->
                        </i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>