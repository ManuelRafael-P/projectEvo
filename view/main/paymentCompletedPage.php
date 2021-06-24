<div class="content">
    <div class="container">
        <div class="text-center jumbotron">
            <i class="fas fa-rocket logo"></i>
            <h2 class="title">¡ Venta exitosa !</h2>
        </div>
        <h3 class="title-small my-3">Productos comprados</h3>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Talla</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->productDao->listProductsOfSale($_REQUEST['saleId']) as $producto) {
                ?>
                    <tr>
                        <td><?php echo $producto->PRODUCT_ID ?></td>
                        <td><?php echo $producto->PRODUCT_NAME ?></td>
                        <td>
                            <img src="assets/productImages/<?php echo $producto->PRODUCT_IMAGE_1 ?>" class="img-thumbnail img-fluid" style="height:20vh" />
                        </td>
                        <td><?php echo $producto->SIZE_SOLD ?></td>
                        <td><?php echo $producto->QUANTITY_SOLD ?></td>
                        <td><?php echo $producto->PRODUCT_PRICE ?></td>
                        <td><?php echo $producto->SALE_DETAIL_TOTAL ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="text-center">
            <a class="btn btn-primary btn-lg" href="?c=producto&a=Index" style="padding: .5em 4em">Seguir comprando</a>
        </div>
    </div>
</div>