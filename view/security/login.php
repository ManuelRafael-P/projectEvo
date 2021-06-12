<div id="loginpage" style="height:100%">
    <div class="container">
        <a href="?c=main&a=Index">X</a>
        <div class="row my-2">
            <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
                <div class="card card-signin">
                    <div class="card-body">
                        <h3 class="alignCenter">Monnijeans : Deliverdukes</h3>
                        <div class="form-group">
                            <img id="profile_pic" src="assets/images/profile_man.png" alt="">
                        </div>
                        <h5 class="card-title text-center"><strong>Inicio de sesión</strong></h5>
                        <form class="form-signin" method="post" action="?c=user&a=check_account">
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
                                <div class="row">
                                    <div class="col-sm-6"><p>¿Olvidaste tu contraseña?</p></div>
                                    <div class="col-sm-6"><p><a href="?c=user&a=recover_password">Recuperar contraseña</a></p></div>
                                </div>
                            </div>
                            <div class="mx-3 my-2">
                                <div class="row">
                                    <div class="col-sm-6"><p>No tienes una cuenta</p></div>
                                    <div class="col-sm-6"><p><a href="?c=user&a=register_form">Registrate aqui</a></p></div>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Iniciar Sesión</button>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>