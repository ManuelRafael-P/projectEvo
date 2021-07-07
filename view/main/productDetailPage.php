<div class="content">
    <form id="form" action="?c=Session&a=addToCart" method="post">
        <div class="container">
            <div class="card card_1">
                <div class="row my-1">
                    <div class="col">
                        <a href="?c=main&a=index" class="btn btn-primary float-left">Regresar a pagina principal</a>
                    </div>
                    <div class="col">
                        <a href="?c=main&a=productCatalog" class="btn btn-primary float-right">Regresar a catalogo</a>
                    </div>
                </div>
                <div class="row my-1">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                                <img src="assets/productImages/<?php echo $producto[0]->PRODUCT_IMAGE_1 ?>" class="imagen_detalle border border-dark img-fluid" style="height:60vh" alt="Imagen" />
                            </div>
                            <div class="tab-pane" id="pic-2">
                                <img src="assets/productImages/<?php echo $producto[0]->PRODUCT_IMAGE_2 ?>" class="imagen_detalle border border-dark img-fluid" style="height:60vh" />
                            </div>
                            <div class="tab-pane" id="pic-3">
                                <img src="assets/productImages/<?php echo $producto[0]->PRODUCT_IMAGE_3 ?>" class="imagen_detalle border border-dark img-fluid" style="height:60vh" />
                            </div>
                            <div class="tab-pane" id="pic-4">
                                <img src="assets/productImages/<?php echo $producto[0]->PRODUCT_IMAGE_4 ?>" class="imagen_detalle border border-dark img-fluid" style="height:60vh" />
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"> <img src="assets/productImages/<?php echo $producto[0]->PRODUCT_IMAGE_1 ?>" class="imagen_detalle border border-dark img-fluid" /></a></li>
                                <li><a data-target="#pic-2" data-toggle="tab"> <img src="assets/productImages/<?php echo $producto[0]->PRODUCT_IMAGE_2 ?>" class="imagen_detalle  border border-dark img-fluid" /></a></li>
                                <li><a data-target="#pic-3" data-toggle="tab"> <img src="assets/productImages/<?php echo $producto[0]->PRODUCT_IMAGE_3 ?>" class="imagen_detalle  border border-dark img-fluid" /></a></li>
                                <li><a data-target="#pic-4" data-toggle="tab"> <img src="assets/productImages/<?php echo $producto[0]->PRODUCT_IMAGE_4 ?>" class="imagen_detalle  border border-dark img-fluid" /></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2><?php echo $producto[0]->PRODUCT_ID ?></h2>
                        <p><?php echo $producto[0]->PRODUCT_NAME ?></p>
                        <p><?php echo $producto[0]->PRODUCT_PRICE ?></p>
                        <p>TALLAS DISPONIBLES</p>
                        <?php
                        if ($producto[0]->STOCK_SIZE_XXS > 0) { ?>

                            <div class="row">
                                <div class="col">
                                    <input type="radio" id="xxs" name="size" value="XXS" checked>
                                    <label for="xxs" data-toggleXXtooltip" data-placement="top" title="<?php echo ($producto[0]->STOCK_SIZE_SSS) ?>">XXS</label><br>
                                </div>
                                <div class="col">
                                    <p><?php echo "UNIDADES DISPONIBLES: " . $producto[0]->STOCK_SIZE_XXS ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($producto[0]->STOCK_SIZE_XS > 0) { ?>
                            <div class="row">
                                <div class="col">
                                    <input type="radio" id="xs" name="size" value="XS">
                                    <label for="xs">XS</label><br>
                                </div>
                                <div class="col">
                                    <p><?php echo "UNIDADES DISPONIBLES: " .  $producto[0]->STOCK_SIZE_XS ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($producto[0]->STOCK_SIZE_S > 0) { ?>
                            <div class="row">
                                <div class="col">
                                    <input type="radio" id="s" name="size" value="S">
                                    <label for="s">S</label><br>
                                </div>
                                <div class="col">
                                    <p><?php echo "UNIDADES DISPONIBLES: " .  $producto[0]->STOCK_SIZE_S ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($producto[0]->STOCK_SIZE_M > 0) { ?>
                            <div class="row">
                                <div class="col">
                                    <input type="radio" id="m" name="size" value="M">
                                    <label for="m">M</label><br>
                                </div>
                                <div class="col">
                                    <p><?php echo "UNIDADES DISPONIBLES: " .  $producto[0]->STOCK_SIZE_M ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($producto[0]->STOCK_SIZE_L > 0) { ?>
                            <div class="row">
                                <div class="col">
                                    <input type="radio" id="l" name="size" value="L">
                                    <label for="l">L</label><br>
                                </div>
                                <div class="col">
                                    <p><?php echo "UNIDADES DISPONIBLES: " .  $producto[0]->STOCK_SIZE_L ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($producto[0]->STOCK_SIZE_XL > 0) { ?>
                            <div class="row">
                                <div class="col">
                                    <input type="radio" id="xl" name="size" value="XL">
                                    <label for="xl">XL</label><br>
                                </div>
                                <div class="col">
                                    <p><?php echo "UNIDADES DISPONIBLES: " .  $producto[0]->STOCK_SIZE_XL ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($producto[0]->STOCK_SIZE_XXL > 0) { ?>
                            <div class="row">
                                <div class="col">
                                    <input type="radio" id="xxl" name="size" value="XXL">
                                    <label for="xxl">XXL</label><br>
                                </div>
                                <div class="col">
                                    <p><?php echo "UNIDADES DISPONIBLES: " .  $producto[0]->STOCK_SIZE_XXL ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <label for="">Cantidad</label>
                        <div class="row text-center my-4">
                            <div class="col">
                                <button type="button" class="btn btn-secondary btn-block less_plus_btn" onclick="dec('quantity')">-</button>
                            </div>
                            <div class="col">
                                <input name="quantity" type="text form-control" readonly value="0">
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-secondary btn-block less_plus_btn" onclick="inc('quantity')">+</button>
                            </div>
                        </div>

                        <input type="hidden" name="productId" value="<?php echo $producto[0]->PRODUCT_ID ?>">
                        <input type="hidden" name="name" value="<?php echo $producto[0]->PRODUCT_NAME ?>">
                        <input type="hidden" name="price" value="<?php echo $producto[0]->PRODUCT_PRICE ?>">
                        <button type="submit" class="btn btn-primary btn-block">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function inc(element) {
        let el = document.querySelector(`[name="${element}"]`);
        el.value = parseInt(el.value) + 1;
    }

    function dec(element) {
        let el = document.querySelector(`[name="${element}"]`);
        if (parseInt(el.value) > 0) {
            el.value = parseInt(el.value) - 1;
        }
    }
</script>