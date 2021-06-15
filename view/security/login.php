<div id="loginpage" style="height:100%">
    <div class="container  h-100">
        <div class="row  h-100 justify-content-center align-items-center">
            <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
                <div class="card card-signin">
                    <div class="card-body">
                        <h3 class="alignCenter">Monnijeans</h3>
                        <div class="form-group">
                            <img id="profile_pic" src="assets/images/profile_man.png" alt="">
                        </div>
                        <h5 class="card-title text-center"><strong>Inicio de sesión</strong></h5>
                        <form class="form-signin" method="post" action="?c=security&a=validateAccount">
                            <?php
                            if ($message) {
                                echo ("<p>Credenciales erroneas</p>");
                            }
                            ?>
                            <div class="form-label-group">
                                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Ingresa tu correo electrónico" required autofocus>
                                <label for="inputEmail"><strong>Correo electrónico</strong></label>

                            </div>
                            <div class="form-label-group">
                                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
                                <label for="inputPassword"><strong>Ingresa tu contraseña</strong></label>
                            </div>
                            <div class="mx-3 my-2">
                                <div class="row alignCenter">
                                    <div class="col-sm-6">
                                        <p>¿Olvidaste tu contraseña?</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><a href="?c=security&a=resetPasswordPage">Reestablecer contraseña</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-3 my-2">
                                <div class="row alignCenter">
                                    <div class="col-sm-6">
                                        <p>No tienes una cuenta</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><a href="?c=security&a=registryPage">Registrate aqui</a></p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Iniciar Sesión</button>
                            <a href="?c=main&a=Index" class="btn btn-lg btn-primary btn-block text-uppercase">Regresar a pagina principal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>