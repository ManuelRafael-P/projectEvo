<title>Adm. de Detalle de Orden</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1>Administración de Detalle de Orden</h1>
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
                            <h3 class="card-title">En esta sección se podra editar un detalle de orden.</h3>
                        </div>
                        <div class="card-body">
                            <table id="tableSystem" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id de Detalle de Orden</th>
                                        <th>ID de Venta</th>
                                        <th>Nombre de usuario</th>
                                        <th>Direccion de envio</th>
                                        <th>Estado de Orden</th>
                                        <th>Fecha de entrega</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($this->orderDetailDao->listOrderDetail() as $c) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $c->ORDER_DETAIL_ID ?></th>
                                            <td><?php echo $c->SALE_ID ?></td>
                                            <td><?php echo $c->USER_FULL_NAME ?></td>
                                            <td><?php echo $c->SHIPPING_ADDRESS ?></td>
                                            <td><?php
                                                if ($c->ORDER_STATUS == 0) {
                                                    echo("No antendido");
                                                } else if ($c->ORDER_STATUS == 1) {
                                                    echo("Antendido");
                                                } else if ($c->ORDER_STATUS == 2) {
                                                    echo("En camino");
                                                } else {
                                                    echo("Entregado");
                                                }

                                                ?></td>
                                            <td><?php echo $c->DELIVERY_DATE ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1" onclick="addToForm(
                                                    <?php echo $c->ORDER_DETAIL_ID ?>,
                                                    <?php echo $c->USER_ID ?>,                                                    <?php echo $c->SALE_ID ?>,
                                                    '<?php echo $c->USER_FULL_NAME ?>',
                                                    '<?php echo $c->SHIPPING_ADDRESS ?>',
                                                    <?php echo $c->ORDER_STATUS ?>,
                                                    '<?php echo $c->DELIVERY_DATE ?>'
                                                    )">Editar</button>
                                            </td>
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

    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Orden</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?c=Color&a=addOrUpdateOrderDetail" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="inputOrderDetailId">Id de orden de detalle</label>
                            <input type="text" class="form-control" name="inputOrderDetailId" id="inputOrderDetailIdE" placeholder="Id de detalle de orden" disabled>
                            <input type="hidden" name="inputOrderDetailId" id="inputOrderDetailIdHiddenE">
                        </div>

                        <div class="form-group">
                            <label for="inputSaleId">Id de Venta</label>
                            <input type="text" class="form-control" name="inputSaleId" id="inputSaleIdE" placeholder="Id de venta" disabled>
                            <input type="hidden" name="inputSaleId" id="inputSaleIdHiddenE">
                        </div>

                        <div class="form-group">
                            <label for="inputUserFullName">Nombre de usuario</label>
                            <input type="text" class="form-control" name="inputUserFullName" id="inputUserFullNameE" placeholder="Ingrese nombre de usuario" disabled>
                            <input type="hidden" name="inputUserFullName" id="inputUserFullNameHiddenE">
                        </div>

                        <div class="form-group">
                            <label for="inputShippingAddress">Dirección de entrega</label>
                            <input type="text" class="form-control" name="inputShippingAddress" id="inputShippingAddressE" placeholder="Ingrese direccion de entrega">
                        </div>

                        <div class="form-group">
                            <label for="inputOrderStatus">Estado de Orden</label>
                            <select name="inputOrderStatus" id="inputOrderStatusE">
                                <option value="3">Entregado</option>
                                <option value="2">En camino</option>
                                <option value="1">Atendido</option>
                                <option value="0">No atendido</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputDeliveryDate">Fecha de Entrega</label>
                            <input type="date" class="form-control" name="inputDeliveryDate" id="inputDeliveryDateE" placeholder="Ingrese fecha de entrega">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar edición</button>
                        <button type="submit" class="btn btn-primary" name="update">Editar registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addToForm(orderDetailId, saleId, userFullName, shippingAddress, orderStatus, deliveryDate) {
            $("#inputOrderDetailIdE").val(orderDetailId);
            $("#inputOrderDetailIdHiddenE").val(orderDetailId);
            $("#inputSaleIdE").val(saleId);
            $("#inputSaleIdHiddenE").val(saleId);
            $("#inputUserFullNameE").val(userFullName);
            $("#inputUserFullNameHiddenE").val(userFullName);
            $("#inputShippingAddressE").val(shippingAddress);
            $("#inputOrderStatusE").val(orderStatus);
            if (orderStatus == 1) {
                $("#inputOrderStatusE  option[value='1']").prop('selected', true);
            } else if (orderStatus == 2) {
                $("#inputOrderStatusE  option[value='2']").prop('selected', true);
            } else if (orderStatus == 3) {
                $("#inputOrderStatusE  option[value='3']").prop('selected', true);
            } else if (orderStatus == 4) {
                $("#inputOrderStatusE  option[value='4']").prop('selected', true);
            }
            //agregar deliveryDate
        }
    </script>

</div>