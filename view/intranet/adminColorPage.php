<title>Adm. de Colores</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1>Administración de Colores</h1>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Agregar Color</button>
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
                            <h3 class="card-title">En esta sección se podra agregar, editar y desactivar un color.</h3>
                        </div>
                        <div class="card-body">
                            <table id="tableSystem" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id de color</th>
                                        <th>Nombre de color</th>
                                        <th>Fecha de registro</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($this->colorDao->listColors() as $c) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $c->COLOR_ID ?></th>
                                            <td><?php echo $c->COLOR_NAME ?></td>
                                            <td><?php echo $c->DT_REGISTRY ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1" onclick="addToForm(<?php echo $c->COLOR_ID ?>,'<?php echo $c->COLOR_NAME ?>')">Editar</button>
                                                <a href="?c=Color&a=deleteColor&id=<?php echo $c->COLOR_ID ?>" class="btn btn-danger">Eliminar</a>
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

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Color</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?c=Color&a=addOrUpdateColor" method="post">
                    <div class="modal-body">
                        <?php
                        $last_id = implode($this->colorDao->getLastId());
                        if (empty($last_id)) {
                            $last_id = 0;
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputColorId">Id de color</label>
                            <input type="text" class="form-control" name="inputColorId" id="inputColorId" placeholder="Id de aula" value=<?php echo ($last_id + 1) ?> disabled>
                            <input type="hidden" name="inputColorId" value=<?php echo ($last_id + 1) ?>>
                        </div>
                        <div class="form-group">
                            <label for="inputColorName">Nombre de color</label>
                            <input type="text" class="form-control" name="inputColorName" id="inputColorName" placeholder="Ingrese color">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar registro</button>
                        <button type="submit" class="btn btn-primary" name="add">Enviar registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Aula</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?c=Color&a=addOrUpdateColor" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputColorId">Id de color</label>
                            <input type="text" class="form-control" name="inputColorId" id="inputColorIdE" placeholder="Id de aula" disabled>
                            <input type="hidden" name="inputColorId" id="inputColorIdHiddenE">
                        </div>
                        <div class="form-group">
                            <label for="inputColorName">Nombre de color</label>
                            <input type="text" class="form-control" name="inputColorName" id="inputColorNameE" placeholder="Ingrese salon">
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
        function addToForm(colorId, colorName) {
            $("#inputColorIdE").val(colorId);
            $("#inputColorIdHiddenE").val(colorId);
            $("#inputColorNameE").val(colorName);
        }
    </script>

</div>