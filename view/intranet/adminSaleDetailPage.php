<title>Adm. de Detalle de Ventas</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1>Administración de Detalle de Ventas</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">En esta sección se podra editar ver detalles de ventas.</h3>
                        </div>
                        <div class="card-body">
                            <table id="tableSystem" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Detalle Venta</th>
                                        <th>ID Venta</th>
                                        <th>ID Producto</th>
                                        <th>Talla vendida</th>
                                        <th>Cantidad vendida</th>
                                        <th>Precio unitario</th>
                                        <th>Total de Detalle Venta</th>
                                        <th>Fecha de Registro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($this->saleDetailDao->listSaleDetails() as $c) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $c->SALE_DETAIL_ID ?></th>
                                            <td><?php echo $c->SALE_ID ?></td>
                                            <td><?php echo $c->PRODUCT_ID ?></td>
                                            <td><?php echo $c->SIZE_SOLD ?></td>
                                            <td><?php echo $c->QUANTITY_SOLD ?></td>
                                            <td><?php echo $c->UNIT_PRICE ?></td>
                                            <td><?php echo $c->SALE_DETAIL_TOTAL ?></td>
                                            <td><?php echo $c->DT_REGISTRY ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>