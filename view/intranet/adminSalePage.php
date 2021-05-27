<title>Adm. de Ventas</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1>Administración de Ventas</h1>
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
                            <h3 class="card-title">En esta sección se podra editar y eliminar una venta.</h3>
                        </div>
                        <div class="card-body">
                            <table id="tableSystem" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID venta</th>
                                        <th>ID usuario</th>
                                        <th>Llave de transaccion</th>
                                        <th>Informacion de paypal</th>
                                        <th>Correo</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Fecha de registro</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($this->saleDao->listSales() as $c) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $c->SALE_ID ?></th>
                                            <td><?php echo $c->USER_ID ?></td>
                                            <td><?php echo $c->TRANSACTION_KEY ?></td>
                                            <td><?php echo $c->PAYPAL_DATA ?></td>
                                            <td><?php echo $c->MAIL ?></td>
                                            <td><?php echo $c->TOTAL ?></td>
                                            <td><?php
                                                if ($c->STATUS == 0) {
                                                    echo ("Pendiente");
                                                } else if ($c->STATUS == 1) {
                                                    echo ("Aprobado");
                                                } else {
                                                    echo ("Completo");
                                                } ?></td>
                                            <td><?php echo $c->DT_REGISTRY ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1" onclick="addToForm(
                                                    <?php echo $c->SALE_ID ?>,
                                                    <?php echo $c->STATUS ?>
                                                    )">Editar</button>
                                                <a href="?c=Sale&a=deleteSale&id=<?php echo $c->SALE_ID ?>" class="btn btn-danger">Eliminar</a>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Aula</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?c=Sale&a=addOrUpdateSale" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputSaleId">Id de venta</label>
                            <input type="text" class="form-control" name="inputSaleId" id="inputSaleIdE" placeholder="Id de venta" disabled>
                            <input type="hidden" name="inputSaleId" id="inputSaleIdHiddenE">
                        </div>
                        <div class="form-group">
                            <label for="inputStatusE">Estado de venta</label>
                            <select name="inputStatus" class="form-control" id="inputStatusE">
                                <option value="0">Pendiente</option>
                                <option value="1">Aprobado</option>
                                <option value="2">Completo</option>
                            </select>
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
        function addToForm(saleId, status) {
            $("#inputSaleIdE").val(saleId);
            $("#inputSaleIdHiddenE").val(saleId);
            if (status == 0) {
                $("#inputStatusE  option[value='0']").prop('selected', true);
            } else if (status == 1) {
                $("#inputStatusE  option[value='1']").prop('selected', true);
            } else if (status == 2) {
                $("#inputStatusE  option[value='2']").prop('selected', true);
            }
        }
    </script>

</div>