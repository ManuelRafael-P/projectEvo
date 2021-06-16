<div class="cabecera-productos text-center animate__animated animate__fadeIn">
    <div class="center">
        <h2 class="title-big">Nuestros productos</h2>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <div class="card h-100">
                        <ul>
                            <li class="my-2">
                                <h4>Tipo de prenda</h4>
                            </li>
                            <li id="filtros" class="my-1"><i class="fas fa-angle-right"></i><a href="?c=producto&a=Listar_Producto_por_categoria&categoria=CHOMPAS"> Chompas</a></li>
                            <li id="filtros" class="my-1"><i class="fas fa-angle-right"></i><a href="?c=producto&a=Listar_Producto_por_categoria&categoria=ZAPATILLAS"> Zapatillas</a></li>
                            <li id="filtros" class="my-1"><i class="fas fa-angle-right"></i><a href="?c=producto&a=Listar_Producto_por_categoria&categoria=POLOS"> Polos</a></li>
                            <li id="filtros" class="my-1"><i class="fas fa-angle-right"></i><a href="?c=producto&a=Listar_Productos"> Sin filtros</a></li>
                        </ul>
                    </div>
                </div>
                <?php
                if (!isset($producto)) {
                    foreach ($this->model->Listar_Productos() as $p) {
                ?>
                        <div class="col-lg-3 mb-3">
                            <div class="card h-100 animate__animated animate__fadeIn">
                                <img src="assets/productImages/<?php echo $p->PRODUCT_IMAGE_1 ?>" class="card-img-top" style="height:60%" />
                                <div class="card-body">
                                    <h5 id="ct" class="card-title"><?php echo ($p->PRODUCT_ID) ?></h5>
                                    <p id="c1" class="card-text"><?php echo ($p->PRODUCT_NAME) ?></p>
                                    <p id="c2" class="card-text">S/<?php echo ($p->PRODUCT_PRICE) ?>.0</p>
                                    <a class="btn" href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>">Ver detalle</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    foreach ($producto as $p) {
                    ?>
                        <div class="col-lg-3 mb-3">
                            <div class="card h-100 animate__animated animate__fadeIn">
                                <a class="" href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>">
                                    <img src="assets/productImages/<?php echo $p->PRODUCT_IMAGE_1 ?>" class="card-img-top" style="height:40vh" />
                                </a>
                                <div class="card-body text-center">
                                    <h5 id="ct" class="card-title">ID : <strong><?php echo ($p->PRODUCT_ID) ?></strong></h5>
                                    <p id="c1" class="card-text"><?php echo ($p->PRODUCT_NAME) ?></p>
                                    <p id="c2" class="card-text">S/<?php echo ($p->PRODUCT_PRICE) ?>.0</p>
                                    <a class="btn btn-primary" href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>">Ver detalle</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>