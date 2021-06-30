<div class="content">
    <div class="container">
        <div class="my-4">
            <div class="row">
                <div class="col">
                    <h2>Información de usuario</h2>
                </div>
                <div class="col">
                    <div class="float-right">
                        <button type="button" class="btn btn-primary" onclick="editInformation()">Editar Información</button>
                    </div>
                </div>
            </div>
            <div class="px-5 py-2">
                <fieldset disabled id="fieldset">
                    <form action="?c=UserSis&a=updateUserClient" method="post">
                        <div class="my-4">
                            <div class="row">
                                <div class="col">
                                    <label for="inputUserNames" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" id="inputUserNames" name="names" value="<?php echo $u[0]['USER_NAMES'] ?>">
                                    <div id="inputUserNamesFeedback">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="inputUserSurnames" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="inputUserSurnames" name="surnames" value="<?php echo $u[0]['USER_SURNAMES'] ?>">
                                    <div id="inputUserSurnamesFeedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-4">
                            <div class="row">
                                <div class="col">
                                    <label for="inputUserEmail" class="form-label">Correo Electronico</label>
                                    <input type="text" class="form-control" id="inputUserEmail" name="email" value="<?php echo $u[0]['USER_EMAIL'] ?>">
                                    <div id="inputUserEmailFeedback">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="inputUserPhone" class="form-label">Celular</label>
                                    <input type="text" class="form-control" id="inputUserPhone" name="phone" onkeypress="return isNumberKey(event)" maxlength="9" value="<?php echo $u[0]['USER_PHONE'] ?>">
                                    <div id="inputUserPhoneFeedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-4">
                            <label for="inputUserAddress" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="inputUserAddress" name="address" value="<?php echo $u[0]['USER_ADDRESS'] ?>">
                            <div id="inputUserAddressFeedback">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" id="submitButton" class="btn btn-primary px-5" onclick="return validateFormUpdateUserClientInfo()">Guardar</button>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
        <div class="my-4">
            <div class="row">
                <div class="col">
                    <h2>Seguridad de cuenta</h2>
                </div>
                <div class="col">
                    <div class="float-right">
                        <button type="button" class="btn btn-primary" onclick="updatePassword()">Cambiar contraseña</button>
                    </div>
                </div>
            </div>

            <div class="px-5 py-2">
                <fieldset disabled id="fieldset_01">
                    <div class="row">
                        <div class="col">
                            <form action="?c=UserSis&a=updateUserClientPassword" method="post">
                                <div class="my-4">
                                    <div class="form-group">
                                        <label for="inputCurrentPassword" class="form-label">Contraseña actual</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" id="inputCurrentPassword" name="currentPassword" class="form-control">
                                            <div class="input-group-addon">
                                                <a href="" class="btn"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="inputCurrentPasswordFeedback">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-4">
                                    <div class="form-group">
                                        <label for="inputNewPassword" class="form-label">Nueva contraseña</label>
                                        <div class="input-group" id="show_hide_password_01">
                                            <input type="password" id="inputNewPassword" name="newPassword" class="form-control">
                                            <div class="input-group-addon">
                                                <a href="" class="btn"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="inputNewPasswordFeedback">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="my-4">
                                    <div class="form-group">
                                        <label for="inputRepeatNewPassword" class="form-label">Repetir nueva contraseña</label>
                                        <div class="input-group" id="show_hide_password_02">
                                            <input type="password" id="inputRepeatNewPassword" name="repeatNewPassword" class="form-control">
                                            <div class="input-group-addon">
                                                <a href="" class="btn"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="inputRepeatNewPasswordFeedback">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="validator" value="false">
                                <div class="text-center">
                                    <button type="submit" id="submitButton" class="btn btn-primary px-5" onclick="return validateFormUpdateUserClientPassword()">Guardar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    Reglas para la contraseña
                                </div>
                                <div class="card-body">
                                    <p>La contraseña debe de cumplir las siguientes reglas:</p>
                                    <ul>
                                        <li id="length">Debe de tener 8 digitos</li>
                                        <li id="capital">Debe de tener 1 letra mayuscula como minimo.</li>
                                        <li id="letter">Debe de tener 1 letra minuscula como minimo.</li>
                                        <li id="number">Debe de tener 1 numero como minimo.</li>
                                        <li id="special">Debe de tener 1 caracter especial como minimo.</li>
                                    </ul>
                                </div>
                                <div class="card-footer text-muted">

                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

        <?php
        if ($_SESSION['user_info']['user_verified'] == 0) {
        ?>
            <div class="my-4">
                <div class="row">
                    <div class="col">
                        <h2>Confirmar cuenta</h2>
                    </div>
                    <div class="col">
                        <div class="float-right">
                            <a href="?c=security&a=sendAccountConfirmationRequest" class="btn btn-primary">Confirmar cuenta</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<script>
    function editInformation() {
        var fieldset = document.getElementById("fieldset");
        var attr = $("#fieldset").attr("disabled");
        if (attr === "disabled") {
            $(fieldset).removeAttr("disabled");
        } else {
            $(fieldset).attr("disabled", true);
        }
    }

    function updatePassword() {
        var fieldset = document.getElementById("fieldset_01");
        var attr = $("#fieldset_01").attr("disabled");
        if (attr === "disabled") {
            $(fieldset).removeAttr("disabled");
        } else {
            $(fieldset).attr("disabled", true);
        }
    }

    var specialCharacter = document.getElementById("special");

    var newPasswordInput = document.getElementById("inputNewPassword");

    var passLetter = true;
    var passnumber = true;
    var passCapital = true;
    var passSpecial = true;
    var passLength = true;

    newPasswordInput.onkeyup = function() {
        var lowerCaseLetters = /[a-z]/g;
        if (newPasswordInput.value.match(lowerCaseLetters)) {
            $("#letter").addClass("valid");
            passLetter = true;
        } else {
            $("letter").removeClass("valid");
            passLetter = false;
        }

        var numbers = /[0-9]/g;
        if (newPasswordInput.value.match(numbers)) {
            $("#number").addClass("valid");
            passnumber = true;
        } else {
            $("#number").removeClass("valid");
            passnumber = false;
        }

        var upperCaseLetters = /[A-Z]/g;
        if (newPasswordInput.value.match(upperCaseLetters)) {
            $("#capital").addClass("valid");
            passCapital = true;
        } else {
            $("#capital").removeClass("valid");
            passCapital = false;
        }

        var specialCharacters = /[ !"#$%&'()*+,\-./:;<=>?@[\\\]^_`{|}~]/;
        if (newPasswordInput.value.match(specialCharacters)) {
            $("#special").addClass("valid");
            passSpecial = true;
        } else {
            $("#special").removeClass("valid");
            passSpecial = false;
        }

        if (newPasswordInput.value.length >= 8) {
            $("#length").addClass("valid");
            passLength = true;
        } else {
            $("#length").removeClass("valid");
            passLength = false;
        }

        if (passLetter && passLength && passSpecial && passCapital && passLength) {
            $("#validator").val("true");
        }
    }
</script>