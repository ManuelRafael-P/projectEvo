<title>Adm. de Tokens de Seguridad</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1>Administración de Tokens de Seguridad</h1>
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
                            <h3 class="card-title">En esta sección se podra eliminar un token de seguridad.</h3>
                        </div>
                        <div class="card-body">
                            <table id="tableSystem" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id de color</th>
                                        <th>Nombre de color</th>
                                        <th>Fecha de registro</th>
                                        <th>Fecha de actualización</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($this->restPswdDao->listRestPswd() as $c) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $c->REST_PWD_ID ?></th>
                                            <td><?php echo $c->REST_EMAIL ?></td>
                                            <td><?php echo $c->REST_SELECTOR ?></td>
                                            <td><?php echo $c->REST_TOKEN ?></td>
                                            <td><?php echo $c->REST_EXPIRE ?></td>
                                            <td>
                                                <a href="?c=RestPswd&a=deleteRestPswd&id=<?php echo $c->REST_PWD_ID ?>" class="btn btn-danger">Eliminar</a>
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
</div>