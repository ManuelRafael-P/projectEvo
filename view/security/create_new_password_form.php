<div id="loginpage" style="height:100%">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
                <div class="card card-signin">
                    <div class="card-body">
                        <h3 class="alignCenter">Monnijeans : Deliverdukes</h3>
                        <h5 class="card-title text-center"><strong>Reestablecer contraseña</strong></h5>
                        <form class="form-signin" action="?c=security&a=submit_new_password" method="post">
                            <input type="hidden" name="inputSelector" value="<?php echo $selector ?>">
                            <input type="hidden" name="inputValidator" value="<?php echo $validator ?>">
                            <div class="form-label-group">
                                <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Ingrese nueva contraseña">
                                <label for="inputPassword"><strong>Ingrese su contraseña</strong></label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" class="form-control" name="inputRepeatPassword" id="inputRepeatPassword" placeholder="Repite tu contraseña">
                                <label for="inputRepeatPassword"><strong>Repita su contraseña</strong></label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit_new_password">Generar nueva contraseña</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>