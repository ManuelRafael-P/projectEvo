<div id="loginpage" style="height:100%">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
                <div class="card card-signin">
                    <div class="card-body">
                        <h3 class="alignCenter">Monnijeans : Deliverdukes</h3>
                        <h5 class="card-title text-center"><strong>Recupera contraseña</strong></h5>
                        <p class="mx-2">Un email se te sera enviado con instrucciones de como recuperar tu contraseña</p>
                        <form class="form-signin" action="?c=security&a=resetPassword" method="post">
                            <?php
                            if ($message_error) {
                                echo ("<p>Correo electronico equivocado</p>");
                            } else if ($message_success) {
                                echo ("<p>Correo electronico enviado con exito. Verifique su bandeja de entrada.</p>");
                            }
                            ?>
                            <div class="form-label-group">
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Ingresa tu correo">
                                <label for="inputEmail"><strong>Correo electrónico</strong></label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit_reset_request">Enviar</button>
                            <a href="?c=security&a=loginPage" class="btn btn-lg btn-primary btn-block text-uppercase" >Regresar a Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>