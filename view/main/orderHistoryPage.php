<div class="content">
    <div class="container">
        <h2>Mis pedidos</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id de Transacción</th>
                    <th>Estado de Orden</th>
                    <th>Fecha de Registro</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $order = $this->orderDetailDao->listOrderDetailByUser($_SESSION['user_info']['user_id']);
                if (!empty($order)) {
                    foreach ($order as $o) {
                ?>
                        <tr>
                            <td><?php echo $o->TRANSACTION_ID ?></td>
                            <td>
                                <?php
                                if ($o->ORDER_STATUS == 0) {
                                    echo ("No atendido");
                                } else if ($o->ORDER_STATUS == 1) {
                                    echo ("En camino");
                                } else {
                                    echo ("Entregado");
                                }
                                ?>
                            </td>
                            <td><?php echo $o->DT_REGISTRY ?></td>
                            <td><a href="?c=main&a=orderDetail&id=<?php echo $o->ORDER_DETAIL_ID ?>">Ver detalle</a></td>
                        </tr>
                <?php
                    }
                } else {
                    echo ("<p>No tiene ordenes</p>");
                }
                ?>
            </tbody>
        </table>

    </div>
</div>