<div class="cabecera-inicio text-center animate__animated animate__fadeIn">
    <div class="center">
        <h2 class="title-big">Bienvenidos a Lorem Store</h2>
    </div>
</div>

<div class="content">
    <div class="container mt-1 mb-3">
        <h2 class="font-weight-light">Productos mas populares</h2>
        <div class="row mx-auto my-auto text-center">
            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner esp w-100" role="listbox">
                    <?php foreach ($this->productDao->listRecentlyAddedProducts() as $index => $p) { ?>
                        <div class="carousel-item <?php if ($index == 0) {
                                                        echo ("active");
                                                    } ?>">
                            <div class="col-md-4">
                                <div class="card card-body animate__animated animate__fadeIn">
                                    <a href="?c=main&a=productDetail&id=<?php echo ($p->PRODUCT_ID) ?>">
                                        <img src="assets/productImages/<?php echo ($p->PRODUCT_IMAGE_1) ?>" class="imagen_detalle border border-dark img-fluid" style="height:40vh" />
                                    </a>
                                    <h4 class="card-title mt-2"><strong><?php echo ($p->PRODUCT_NAME) ?></strong></h4>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="card-text">ID : <?php echo ($p->PRODUCT_ID) ?></p>
                                        </div>
                                        <div class="col">
                                            <p class="card-text">S/.<?php echo ($p->PRODUCT_PRICE) ?></p>
                                        </div>
                                    </div>

                                    <a href="?c=main&a=productDetail&id=<?php echo ($p->PRODUCT_ID) ?>" class="btn btn-primary">Ver detalle</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col">
                <h2 class="font-weight-light">Casacas</h2>
            </div>
            <div class="col">
                <div class="float-right mt-2">
                    <a href="?c=main&a=productCatalog&id=1">Ver mas</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (!empty($productCat01)) {
                foreach ($productCat01 as $p) {
            ?>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                <strong><?php echo $p->PRODUCT_NAME ?></strong>
                            </div>
                            <div class="card-body">
                                <a href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>">
                                    <img src="assets/productImages/<?php echo ($p->PRODUCT_IMAGE_1) ?>" class="imagen_detalle border border-dark img-fluid" style="height:30vh" />
                                </a>
                                <div class="row mt-2">
                                    <div class="col">
                                        <p class="card-text">ID:<?php echo $p->PRODUCT_ID ?></p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text">S/. :<?php echo $p->PRODUCT_PRICE ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>" class="btn btn-primary">Ver detalle</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo ("<p class='text-center'><strong>No se tiene productos de esta categoria.</strong></p>");
            }
            ?>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col">
                <h2 class="font-weight-light">Conjunto</h2>
            </div>
            <div class="col">
                <div class="float-right mt-2">
                    <a href="?c=main&a=productCatalog&id=2">Ver mas</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (!empty($productCat02)) {
                foreach ($productCat02 as $p) {
            ?>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                <strong><?php echo $p->PRODUCT_NAME ?></strong>
                            </div>
                            <div class="card-body">
                                <a href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>">
                                    <img src="assets/productImages/<?php echo ($p->PRODUCT_IMAGE_1) ?>" class="imagen_detalle border border-dark img-fluid" style="height:30vh" />
                                </a>
                                <div class="row mt-2">
                                    <div class="col">
                                        <p class="card-text">ID:<?php echo $p->PRODUCT_ID ?></p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text">S/. :<?php echo $p->PRODUCT_PRICE ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>" class="btn btn-primary">Ver detalle</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo ("<p class='text-center'><strong>No se tiene productos de esta categoria.</strong></p>");
            }
            ?>
        </div>
    </div>

    <div class="container mt-1 mb-3">
        <h2 class="font-weight-light">Productos mas populares</h2>
        <div class="row mx-auto my-auto text-center">
            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner esp w-100" role="listbox">
                    <?php foreach ($this->productDao->listRecentlyAddedProducts() as $index => $p) { ?>
                        <div class="carousel-item <?php if ($index == 0) {
                                                        echo ("active");
                                                    } ?>">
                            <div class="col-md-4">
                                <div class="card card-body animate__animated animate__fadeIn">
                                    <a href="?c=main&a=productDetail&id=<?php echo ($p->PRODUCT_ID) ?>">
                                        <img src="assets/productImages/<?php echo ($p->PRODUCT_IMAGE_1) ?>" class="imagen_detalle border border-dark img-fluid" style="height:40vh" />
                                    </a>
                                    <h4 class="card-title mt-2"><strong><?php echo ($p->PRODUCT_NAME) ?></strong></h4>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="card-text">ID : <?php echo ($p->PRODUCT_ID) ?></p>
                                        </div>
                                        <div class="col">
                                            <p class="card-text">S/.<?php echo ($p->PRODUCT_PRICE) ?></p>
                                        </div>
                                    </div>

                                    <a href="?c=main&a=productDetail&id=<?php echo ($p->PRODUCT_ID) ?>" class="btn btn-primary">Ver detalle</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col">
                <h2 class="font-weight-light">Jean</h2>
            </div>
            <div class="col">
                <div class="float-right mt-2">
                    <a href="?c=main&a=productCatalog&id=3">Ver mas</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (!empty($productCat03)) {
                foreach ($productCat03 as $p) {
            ?>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                <strong><?php echo $p->PRODUCT_NAME ?></strong>
                            </div>
                            <div class="card-body">
                                <a href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>">
                                    <img src="assets/productImages/<?php echo ($p->PRODUCT_IMAGE_1) ?>" class="imagen_detalle border border-dark img-fluid" style="height:30vh" />
                                </a>
                                <div class="row mt-2">
                                    <div class="col">
                                        <p class="card-text">ID:<?php echo $p->PRODUCT_ID ?></p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text">S/. :<?php echo $p->PRODUCT_PRICE ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>" class="btn btn-primary">Ver detalle</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo ("<p class='text-center'><strong>No se tiene productos de esta categoria.</strong></p>");
            }
            ?>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col">
                <h2 class="font-weight-light">Jogger</h2>
            </div>
            <div class="col">
                <div class="float-right mt-2">
                    <a href="?c=main&a=productCatalog&id=4">Ver mas</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (!empty($productCat04)) {
                foreach ($productCat04 as $p) {
            ?>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                <strong><?php echo $p->PRODUCT_NAME ?></strong>
                            </div>
                            <div class="card-body">
                                <a href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>">
                                    <img src="assets/productImages/<?php echo ($p->PRODUCT_IMAGE_1) ?>" class="imagen_detalle border border-dark img-fluid" style="height:30vh" />
                                </a>
                                <div class="row mt-2">
                                    <div class="col">
                                        <p class="card-text">ID:<?php echo $p->PRODUCT_ID ?></p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text">S/. :<?php echo $p->PRODUCT_PRICE ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>" class="btn btn-primary">Ver detalle</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo ("<p class='text-center'><strong>No se tiene productos de esta categoria.</strong></p>");
            }
            ?>
        </div>
    </div>

    <div class="container mt-1 mb-3">
        <h2 class="font-weight-light">Productos mas populares</h2>
        <div class="row mx-auto my-auto text-center">
            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner esp w-100" role="listbox">
                    <?php foreach ($this->productDao->listRecentlyAddedProducts() as $index => $p) { ?>
                        <div class="carousel-item <?php if ($index == 0) {
                                                        echo ("active");
                                                    } ?>">
                            <div class="col-md-4">
                                <div class="card card-body animate__animated animate__fadeIn">
                                    <a href="?c=main&a=productDetail&id=<?php echo ($p->PRODUCT_ID) ?>">
                                        <img src="assets/productImages/<?php echo ($p->PRODUCT_IMAGE_1) ?>" class="imagen_detalle border border-dark img-fluid" style="height:40vh" />
                                    </a>
                                    <h4 class="card-title mt-2"><strong><?php echo ($p->PRODUCT_NAME) ?></strong></h4>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="card-text">ID : <?php echo ($p->PRODUCT_ID) ?></p>
                                        </div>
                                        <div class="col">
                                            <p class="card-text">S/.<?php echo ($p->PRODUCT_PRICE) ?></p>
                                        </div>
                                    </div>

                                    <a href="?c=main&a=productDetail&id=<?php echo ($p->PRODUCT_ID) ?>" class="btn btn-primary">Ver detalle</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col">
                <h2 class="font-weight-light">Overall</h2>
            </div>
            <div class="col">
                <div class="float-right mt-2">
                    <a href="?c=main&a=productCatalog&id=5">Ver mas</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (!empty($productCat05)) {
                foreach ($productCat05 as $p) {
            ?>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                <strong><?php echo $p->PRODUCT_NAME ?></strong>
                            </div>
                            <div class="card-body">
                                <a href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>">
                                    <img src="assets/productImages/<?php echo ($p->PRODUCT_IMAGE_1) ?>" class="imagen_detalle border border-dark img-fluid" style="height:30vh" />
                                </a>
                                <div class="row mt-2">
                                    <div class="col">
                                        <p class="card-text">ID:<?php echo $p->PRODUCT_ID ?></p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text">S/. :<?php echo $p->PRODUCT_PRICE ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>" class="btn btn-primary">Ver detalle</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo ("<p class='text-center'><strong>No se tiene productos de esta categoria.</strong></p>");
            }
            ?>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col">
                <h2 class="font-weight-light">Short</h2>
            </div>
            <div class="col">
                <div class="float-right mt-2">
                    <a href="?c=main&a=productCatalog&id=6">Ver mas</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (!empty($productCat06)) {
                foreach ($productCat06 as $p) {
            ?>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                <strong><?php echo $p->PRODUCT_NAME ?></strong>
                            </div>
                            <div class="card-body">
                                <a href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>">
                                    <img src="assets/productImages/<?php echo ($p->PRODUCT_IMAGE_1) ?>" class="imagen_detalle border border-dark img-fluid" style="height:30vh" />
                                </a>
                                <div class="row mt-2">
                                    <div class="col">
                                        <p class="card-text">ID:<?php echo $p->PRODUCT_ID ?></p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text">S/. :<?php echo $p->PRODUCT_PRICE ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="?c=main&a=productDetail&id=<?php echo $p->PRODUCT_ID ?>" class="btn btn-primary">Ver detalle</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo ("<p class='text-center'><strong>No se tiene productos de esta categoria.</strong></p>");
            }
            ?>
        </div>
    </div>
</div>





<script>
    $('#recipeCarousel').carousel({
        interval: 5000
    })
    $('#recipeCarousel_1').carousel({
        interval: 5000
    })
    $('#recipeCarousel_2').carousel({
        interval: 5000
    })


    $('.carousel .carousel-item').each(function() {
        var minPerSlide = 3;
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < minPerSlide; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });
</script>