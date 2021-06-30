<div class="content">
    <div class="container">
        <div class="my-4">
            <div class="row">
                <div class="col">
                    <h2>Detalle de orden</h2>
                </div>
                <div class="col">
                    <div class="float-right">
                        <a class="btn btn-primary btn-lg" href="?c=main&a=myOrderHistory">Regresar a mis pedidos</a>
                        <a class="btn btn-primary btn-lg" href="?c=payment&a=generateInvoice&uid=<?php echo $userId ?>&sid=<?php echo $saleId ?>&oid=<?php echo $orderId ?>">Descargar comprobante</a>
                    </div>
                </div>
            </div>
            <div class="px-5 py-2">
                <div class="my-4">
                    <label for="" class="form-label">Id de transacción</label>
                    <input type="text" class="form-control" value="<?php echo $order['0']['TRANSACTION_ID'] ?>" disabled>
                </div>
                <div class="my-4">
                    <label for="" class="form-label">Nombre del comprador</label>
                    <input type="text" class="form-control" value="<?php echo $order['0']['USER_FULL_NAME'] ?>" disabled>
                </div>
                <div class="my-4">
                    <div class="row">
                        <div class="col">
                            <label for="" class="form-label">Dirección de entrega</label>
                            <input type="text" class="form-control" value="<?php echo $order['0']['SHIPPING_ADDRESS'] ?>" disabled>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Telefono de referencia</label>
                            <input type="text" class="form-control" value="<?php echo $order['0']['PHONE'] ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <div class="row">
                        <div class="col">
                            <label for="" class="form-label">Numero de comprobante</label>
                            <input type="text" class="form-control" value="<?php echo $order['0']['INVOICE_NUMBER'] ?>" disabled>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Estado de Orden</label>
                            <input type="text" class="form-control" value="<?php echo $order['0']['ORDER_STATUS'] ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <div class="row">
                        <div class="col">
                            <label for="" class="form-label">Fecha de Entrega</label>
                            <input type="text" class="form-control" value="<?php echo $order['0']['DELIVERY_DATE'] ?>" disabled>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Fecha de registro de orden</label>
                            <input type="text" class="form-control" value="<?php echo $order['0']['DT_REGISTRY'] ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-4">
            <h2>Detalle de Compra</h2>
            <table class="table text-center my-4">
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
                    foreach ($saleDetail as $producto) {
                    ?>
                        <tr>
                            <td><?php echo $producto->PRODUCT_ID ?></td>
                            <td><?php echo $producto->PRODUCT_NAME ?></td>
                            <td>
                                <img src="assets/productImages/<?php echo $producto->PRODUCT_IMAGE_1 ?>" class="img-thumbnail img-fluid" style="height:20vh" />
                            </td>
                            <td><?php echo $producto->SIZE_SOLD ?></td>
                            <td><?php echo $producto->QUANTITY_SOLD ?></td>
                            <td>S/.<?php echo $producto->PRODUCT_PRICE ?>.00</td>
                            <td>S/.<?php echo $producto->SALE_DETAIL_TOTAL ?>.00</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="my-5">
            <div class="row px-5">
                <div class="col">
                    <div class="float-right">
                        <h2>Total pagado</h2>
                    </div>
                </div>
                <div class="col">
                    <div class="float-left">
                        <p style="font-size: 2rem;"><strong>S/.<?php echo $sale['0']['TOTAL'] ?>.00</strong></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>