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
                            <?php
                            foreach ($this->productCategoryDao->listCategoryForFilters() as $c) {
                            ?>
                                <li id="filtros" class="my-1"><i class="fas fa-angle-right"></i><a href="?c=main&a=ProductCatalog&id=<?php echo $c->PRODUCT_CATEGORY_ID ?>"> <?php echo $c->PRODUCT_CATEGORY_NAME ?></a></li>
                            <?php
                            }
                            ?>
                            <li id="filtros" class="my-1"><i class="fas fa-angle-right"></i><a href="?c=main&a=ProductCatalog"> Sin filtros</a></li>
                        </ul>
                    </div>
                </div>
                <?php
                if (!empty($producto)) {
                    foreach ($producto as $p) {
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
                    ?>
                    <div class="col-lg-9 mb-3 text-center">
                        <p class="">No se tiene productos de esta categoria.</p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>