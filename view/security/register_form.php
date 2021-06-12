<div class="container">
    <a href="?c=user&a=login">Regresar login</a>
    <div class="row mt-5">
        <div class="col-sm-9 col-md-7 col-lg-10 mx-auto mt-5">
            <div class="card  card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Registro de nuevo usuario</h5>
                    <form class="form-signin" method="post" action="?c=user&a=register_user_client">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-label-group">
                                    <input type="text" id="inputNames" name="inputNames" class="form-control" placeholder="Names address" required autofocus>
                                    <label for="inputNames">Nombres</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-label-group">
                                    <input type="text" id="inputSurNames" name="inputSurNames" class="form-control" placeholder="SurNames" required autofocus>
                                    <label for="inputSurNames">Apellidos</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                    <label for="inputEmail">Correo electronico</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-label-group">
                                    <input type="Phone" id="inputPhone" name="inputPhone" class="form-control" placeholder="Mobile phone" required autofocus>
                                    <label for="inputPhone">Telefono celular</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-label-group">
                                    <input type="text" id="inputAddress" name="inputAddress" class="form-control" placeholder="Address" required autofocus>
                                    <label for="inputAddress">Dirección</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <p class="mx-4">Instrucciones de contraseña</p>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                                    <label for="inputPassword">Contraseña</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-label-group">
                                    <input type="password" id="inputRepeatPassword" name="inputRepeatPassword" class="form-control" placeholder="RepeatPassword" required>
                                    <label for="inputRepeatPassword">Repetir Contraseña</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrar</button>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>