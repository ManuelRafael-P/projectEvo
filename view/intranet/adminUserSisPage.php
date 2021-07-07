<title>Adm. de Usuarios</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1>Administración de Usuarios</h1>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Agregar Usuario</button>
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
                            <h3 class="card-title">En esta sección se podra agregar, editar y eliminar un usuario.</h3>
                        </div>
                        <div class="card-body">
                            <table id="tableSystem" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Usuario</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th>Dirección</th>
                                        <th>Telefono</th>
                                        <th>Tipo de Usuario</th>
                                        <th>Cuenta verificada</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($this->userSisDao->listUsers() as $c) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $c->USER_ID ?></th>
                                            <td><?php echo $c->USER_NAMES ?></td>
                                            <td><?php echo $c->USER_SURNAMES ?></td>
                                            <td><?php echo $c->USER_EMAIL ?></td>
                                            <td><?php echo $c->USER_ADDRESS ?></td>
                                            <td><?php echo $c->USER_PHONE ?></td>
                                            <td><?php
                                                if ($c->USER_TYPE == 1) {
                                                    echo ("Administrador");
                                                } else {
                                                    echo ("Cliente");
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($c->USER_ACCOUNT_VERIFIED == 1) {
                                                    echo ("Si");
                                                } else {
                                                    echo ("No");
                                                }
                                                ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1" onclick="addToForm(
                                                    <?php echo $c->USER_ID ?>,
                                                    '<?php echo $c->USER_NAMES ?>',
                                                    '<?php echo $c->USER_SURNAMES ?>',
                                                    '<?php echo $c->USER_EMAIL ?>',
                                                    '<?php echo $c->USER_ADDRESS ?>',
                                                    '<?php echo $c->USER_PHONE ?>',
                                                    <?php echo $c->USER_TYPE ?>,
                                                    <?php echo $c->USER_ACCOUNT_VERIFIED ?>
                                                    )">Editar</button>
                                                <a href="?c=UserSis&a=deleteUser&id=<?php echo $c->USER_ID ?>" class="btn btn-danger">Eliminar</a>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?c=UserSis&a=addOrUpdateUser" method="post">
                    <div class="modal-body">
                        <?php
                        $last_id = implode($this->userSisDao->getLastId());
                        if (empty($last_id)) {
                            $last_id = 0;
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputUserId">Id de usuario</label>
                            <input type="text" class="form-control" name="inputUserId" id="inputUserId" placeholder="Id de usuario" value=<?php echo ($last_id + 1) ?> disabled>
                            <input type="hidden" name="inputUserId" value=<?php echo ($last_id + 1) ?>>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputNames">Nombres de usuario</label>
                                    <input type="text" class="form-control" name="inputNames" id="inputNames" placeholder="Ingese nombres de usuario">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputSurnames">Apellidos de usuario</label>
                                    <input type="text" class="form-control" name="inputSurnames" id="inputSurnames" placeholder="Ingrese apellidos de usuario">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">Correo electronico</label>
                            <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Ingrese correo electronico">
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputPhone">Telefono</label>
                                    <input type="text" class="form-control" name="inputPhone" id="inputPhone" placeholder="Ingrese telefono">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputAddress">Dirección</label>
                                    <input type="text" class="form-control" name="inputAddress" id="inputAddress" placeholder="Ingrese direccion">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div>
                                    <label for="inputType">Tipo de usuario</label>
                                    <select name="inputType" id="inputType" class="form-control">
                                        <option value="default">Eliga un tipo de usuario</option>
                                        <option value="0">Cliente</option>
                                        <option value="1">Administrador</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <label for="inputAccountVerified">cuenta verificada</label>
                                    <select name="inputAccountVerified" id="inputAccountVerified" class="form-control">
                                        <option value="default">Eliga un tipo de usuario</option>
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                            </div>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?c=UserSis&a=addOrUpdateUser" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputUserId">Id de usuario</label>
                            <input type="text" class="form-control" name="inputUserId" id="inputUserIdE" placeholder="Id de aula" disabled>
                            <input type="hidden" name="inputUserId" id="inputUserIdHiddenE">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputNames">Nombres de usuario</label>
                                    <input type="text" class="form-control" name="inputNames" id="inputNamesE" placeholder="Ingrese nombres">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputSurnames">Apellidos de usuario</label>
                                    <input type="text" class="form-control" name="inputSurnames" id="inputSurnamesE" placeholder="Ingrese apellidos">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">Correo electronico</label>
                            <input type="email" class="form-control" name="inputEmail" id="inputEmailE" placeholder="Ingrese correo electronico">
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputPhone">Telefono</label>
                                    <input type="text" class="form-control" name="inputPhone" id="inputPhoneE" placeholder="Ingrese telefono">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputAddress">Dirección</label>
                                    <input type="text" class="form-control" name="inputAddress" id="inputAddressE" placeholder="Ingrese direccion">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div>
                                    <label for="inputType">Tipo de usuario</label>
                                    <select name="inputType" id="inputTypeE" class="form-control">
                                        <option value="0">Cliente</option>
                                        <option value="1">Administrador</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <label for="inputAccountVerified">cuenta verificada</label>
                                    <select name="inputAccountVerified" id="inputAccountVerifiedE" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar registro</button>
                        <button type="submit" class="btn btn-primary" name="update">Enviar registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addToForm(userId, names, surnames, email, address, phone, type, accountVerified) {
            $("#inputUserIdE").val(userId);
            $("#inputUserIdHiddenE").val(userId);
            $("#inputNamesE").val(names);
            $("#inputSurnamesE").val(surnames);
            $("#inputEmailE").val(email);
            $("#inputPhoneE").val(phone);
            $("#inputAddressE").val(address);

            if (type == 1) {
                $("#inputTypeE  option[value='1']").prop('selected', true);
            } else if (type == 0) {
                $("#inputTypeE  option[value='0']").prop('selected', true);
            }

            if (accountVerified == 1) {
                $("#inputAccountVerifiedE  option[value='1']").prop('selected', true);
            } else if (accountVerified == 0) {
                $("#inputAccountVerifiedE  option[value='0']").prop('selected', true);
            }


        }
    </script>

</div>