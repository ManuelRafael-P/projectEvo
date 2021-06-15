<div id="loginpage" style="height:100%">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-sm-9 col-md-7 col-lg-10 mx-auto mt-5">
                <div class="card  card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Registro de nuevo usuario</h5>
                        <form class="form-signin" method="post" action="?c=security&a=registerUserTypeClient" oninput='inputRepeatPassword.setCustomValidity(inputRepeatPassword.value != inputPassword.value ? "Las contraseñas no coinciden." : "")' >
                            <?php if ($message) {
                                echo ("<p>Registro exitoso.</p>");
                            } else if ($error) {
                                echo ("<p>Este correo ya fue utilizado.</p>");
                            }
                            ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputNames" name="inputNames" class="form-control" placeholder="Names address" onkeydown="return /[a-z ]/i.test(event.key)" autofocus required>
                                        <label for="inputNames">Nombres</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputSurNames" name="inputSurNames" class="form-control" placeholder="SurNames" onkeydown="return /[a-z ]/i.test(event.key)" autofocus required>
                                        <label for="inputSurNames">Apellidos</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" autofocus required>
                                        <label for="inputEmail">Correo electronico</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-label-group">
                                        <input type="Phone" id="inputPhone" name="inputPhone" class="form-control" placeholder="Mobile phone" minlength="9" autofocus required>
                                        <label for="inputPhone">Telefono celular</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputAddress" name="inputAddress" class="form-control" placeholder="Address" autofocus required>
                                        <label for="inputAddress">Dirección</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" onkeydown="return /[a-z0-9!@#$%^&*_=+-]/i.test(event.key)" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8}$">
                                        <label for="inputPassword">Contraseña</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-label-group">
                                        <input type="password" id="inputRepeatPassword" name="inputRepeatPassword" maxlength="8" class="form-control" placeholder="RepeatPassword">
                                        <label for="inputRepeatPassword">Repetir Contraseña</label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrar</button>
                            <a href="?c=security&a=loginPage" class="btn btn-lg btn-primary btn-block text-uppercase">Regresar a login</a>
                        </form>
                    </div>
                    <div class="card  card-signin " id="message_password">
                        <h3>La contraseña debe cumplir las siguientes características:</h3>
                        <p id="letter" class="invalid">Al menos una letra <b>minúscula</b></p>
                        <p id="capital" class="invalid">Al menos una letra <b>mayúscula</b></p>
                        <p id="number" class="invalid">Al menos un <b>número</b></p>
                        <p id="length" class="invalid">La contraseña debe tener <b>8 caracteres</b></p>
                        <p id="symbol" class="invalid">La contraseña debe incluir al menos uno de los siguientes caracteres especiales <b>!@#$%^&*_=+-</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/js/main.js"></script>