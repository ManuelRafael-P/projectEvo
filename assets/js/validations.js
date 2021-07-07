function validateFormUpdateUserClientInfo() {
    var names = document.getElementById("inputUserNames").value;
    var surnames = document.getElementById("inputUserSurnames").value;
    var email = document.getElementById("inputUserEmail").value;
    var phone = document.getElementById("inputUserPhone").value;
    var address = document.getElementById("inputUserAddress").value;

    var passNames = true;
    var passSurnames = true;
    var passEmail = true;
    var passPhone = true;
    var passAddress = true;

    $("#inputUserNames").removeClass("is-valid");
    $("#inputUserSurnames").removeClass("is-valid");
    $("#inputUserEmail").removeClass("is-valid");
    $("#inputUserPhone").removeClass("is-valid");
    $("#inputUserAddress").removeClass("is-valid");

    $("#inputUserNames").removeClass("is-invalid");
    $("#inputUserSurnames").removeClass("is-invalid");
    $("#inputUserEmail").removeClass("is-invalid");
    $("#inputUserPhone").removeClass("is-invalid");
    $("#inputUserAddress").removeClass("is-invalid");

    $("#inputUserNamesFeedback").empty();
    $("#inputUserSurnamesFeedback").empty();
    $("#inputUserEmailFeedback").empty();
    $("#inputUserPhoneFeedback").empty();
    $("#inputUserAddressFeedback").empty();

    $("#inputUserNamesFeedback").removeClass("invalid-feedback");
    $("#inputUserSurnamesFeedback").removeClass("invalid-feedback");
    $("#inputUserEmailFeedback").removeClass("invalid-feedback");
    $("#inputUserPhoneFeedback").removeClass("invalid-feedback");
    $("#inputUserAddressFeedback").removeClass("invalid-feedback");

    $("#inputUserNamesFeedback").removeClass("valid-feedback");
    $("#inputUserSurnamesFeedback").removeClass("valid-feedback");
    $("#inputUserEmailFeedback").removeClass("valid-feedback");
    $("#inputUserPhoneFeedback").removeClass("valid-feedback");
    $("#inputUserAddressFeedback").removeClass("valid-feedback");

    if (names !== "") {
        $("#inputUserNames").addClass("is-valid");
        $("#inputUserNamesFeedback").addClass("valid-feedback").append("Es correcto!");
        var passNames = true;
    } else {
        $("#inputUserNames").addClass("is-invalid");
        $("#inputUserNamesFeedback").addClass("invalid-feedback").append("Por favor, ingrese sus nombres.");
        var passNames = false;
    }

    if (surnames !== "") {
        $("#inputUserSurnames").addClass("is-valid");
        $("#inputUserSurnamesFeedback").addClass("valid-feedback").append("Es correcto!");
        var passSurnames = true;
    } else {
        $("#inputUserSurnames").addClass("is-invalid");
        $("#inputUserSurnamesFeedback").addClass("invalid-feedback").append("Por favor, ingrese sus apellidos.");
        var passSurnames = false;
    }

    if (email !== "") {
        $("#inputUserEmail").addClass("is-valid");
        $("#inputUserEmailFeedback").addClass("valid-feedback").append("Es correcto!");
        var passEmail = true;
    } else {
        $("#inputUserEmail").addClass("is-invalid");
        $("#inputUserEmailFeedback").addClass("invalid-feedback").append("Por favor, ingrese su correo electronico.");
        var passEmail = false;
    }

    if (phone !== "") {
        $("#inputUserPhone").addClass("is-valid");
        $("#inputUserPhoneFeedback").addClass("valid-feedback").append("Es correcto!");
        var passPhone = true;
    } else {
        $("#inputUserPhone").addClass("is-invalid");
        $("#inputUserPhoneFeedback").addClass("invalid-feedback").append("Por favor, ingrese su telefono celular.");
        var passPhone = false;
    }

    if (address !== "") {
        $("#inputUserAddress").addClass("is-valid");
        $("#inputUserAddressFeedback").addClass("valid-feedback").append("Es correcto!");
        var passAddress = true;
    } else {
        $("#inputUserAddress").addClass("is-invalid");
        $("#inputUserAddressFeedback").addClass("invalid-feedback").append("Por favor, ingrese su dirección domicilaria.");
        var passAddress = false;
    }

    if (passNames && passSurnames && passEmail && passPhone && passAddress) {
        return true;
    } else {
        return false;
    }
}

function validateFormUpdateUserClientPassword() {
    var currentPassword = document.getElementById("inputCurrentPassword").value;
    var newPassword = document.getElementById("inputNewPassword").value;
    var repeatNewPassword = document.getElementById("inputRepeatNewPassword").value;

    var inputHidden = document.getElementById("validator").value;

    var passCurrentPassword = true;
    var passNewPassword = true;
    var passRepeatNewPassword = true;

    $("#inputCurrentPassword").removeClass("is-valid");
    $("#inputNewPassword").removeClass("is-valid");
    $("#inputRepeatNewPassword").removeClass("is-valid");

    $("#inputCurrentPassword").removeClass("is-invalid");
    $("#inputNewPassword").removeClass("is-invalid");
    $("#inputRepeatNewPassword").removeClass("is-invalid");

    $("#inputCurrentPasswordFeedback").empty();
    $("#inputNewPasswordFeedback").empty();
    $("#inputRepeatNewPasswordFeedback").empty();

    $("#inputCurrentPasswordFeedback").removeClass("valid-feedback");
    $("#inputNewPasswordFeedback").removeClass("valid-feedback");
    $("#inputRepeatNewPasswordFeedback").removeClass("valid-feedback");

    $("#inputCurrentPasswordFeedback").removeClass("invalid-feedback");
    $("#inputNewPasswordFeedback").removeClass("invalid-feedback");
    $("#inputRepeatNewPasswordFeedback").removeClass("invalid-feedback");

    if (currentPassword !== "") {
        $("#inputCurrentPassword").addClass("is-valid");
        $("#inputCurrentPasswordFeedback").addClass("valid-feedback").append("Es correcto!");
        passCurrentPassword = true;
    } else {
        $("#inputCurrentPassword").addClass("is-invalid");
        $("#inputCurrentPasswordFeedback").addClass("invalid-feedback").append("Por favor, ingresa una contraseña.");
        passCurrentPassword = false;
    }

    if (newPassword !== "") {
        if (inputHidden === "true") {
            $("#inputNewPassword").addClass("is-valid");
            $("#inputNewPasswordFeedback").addClass("valid-feedback").append("Es correcto!");
            passNewPassword = true;
        } else {
            $("#inputNewPassword").addClass("is-invalid");
            $("#inputNewPasswordFeedback").addClass("invalid-feedback").append("Por favor, ingresa una contraseña que cumpla las reglas.");
            passNewPassword = false;
        }
    } else {
        $("#inputNewPassword").addClass("is-invalid");
        $("#inputNewPasswordFeedback").addClass("invalid-feedback").append("Por favor, ingresa una contraseña.");
        passNewPassword = false;
    }

    if (repeatNewPassword !== "") {
        if (newPassword === repeatNewPassword) {
            $("#inputRepeatNewPassword").addClass("is-valid");
            $("#inputRepeatNewPasswordFeedback").addClass("valid-feedback").append("Es correcto!");
            passRepeatNewPassword = true;
        } else {
            $("#inputRepeatNewPassword").addClass("is-invalid");
            $("#inputRepeatNewPasswordFeedback").addClass("invalid-feedback").append("Las contraseñas no son iguales.");
            passRepeatNewPassword = false;
        }
    } else {
        $("#inputRepeatNewPassword").addClass("is-invalid");
        $("#inputRepeatNewPasswordFeedback").addClass("invalid-feedback").append("Por favor, ingresa una contraseña.");
        passRepeatNewPassword = false;
    }

    if (passCurrentPassword && passNewPassword && passRepeatNewPassword) {
        return true;
    } else {
        return false;
    }
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

$(document).ready(function () {
    $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });

    $("#show_hide_password_01 a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password_01 input').attr("type") == "text") {
            $('#show_hide_password_01 input').attr('type', 'password');
            $('#show_hide_password_01 i').addClass("fa-eye-slash");
            $('#show_hide_password_01 i').removeClass("fa-eye");
        } else if ($('#show_hide_password_01 input').attr("type") == "password") {
            $('#show_hide_password_01 input').attr('type', 'text');
            $('#show_hide_password_01 i').removeClass("fa-eye-slash");
            $('#show_hide_password_01 i').addClass("fa-eye");
        }
    });

    $("#show_hide_password_02 a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password_02 input').attr("type") == "text") {
            $('#show_hide_password_02 input').attr('type', 'password');
            $('#show_hide_password_02 i').addClass("fa-eye-slash");
            $('#show_hide_password_02 i').removeClass("fa-eye");
        } else if ($('#show_hide_password_02 input').attr("type") == "password") {
            $('#show_hide_password_02 input').attr('type', 'text');
            $('#show_hide_password_02 i').removeClass("fa-eye-slash");
            $('#show_hide_password_02 i').addClass("fa-eye");
        }
    });
});