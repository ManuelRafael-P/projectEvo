window.onload = function() {
    var title = document.getElementsByTagName("title")[0].innerHTML;
    var tableSystem = document.getElementById("tableSystem");

    addClasstoSideBarLink(title);

    if (tableSystem) {
        addPluginDaTable("tableSystem");
    }

};

function addClasstoSideBarLink(title) {
    if (title === "Adm. de Colores") {
        $("#mod_admin").addClass("menu-open");
        $("#cont_admin").addClass("active");
        $("#adm-col").addClass("active");
    } else if (title == "Adm. de Cat. de Productos") {
        $("#mod_admin").addClass("menu-open");
        $("#cont_admin").addClass("active");
        $("#adm-pro-cat").addClass("active");
    } else if (title == "Adm. de Detalle de Orden") {
        $("#mod_admin").addClass("menu-open");
        $("#cont_admin").addClass("active");
        $("#adm-ord-det").addClass("active");
    } else if (title == "Adm. de Detalle de Ventas") {
        $("#mod_admin").addClass("menu-open");
        $("#cont_admin").addClass("active");
        $("#adm-sal-det").addClass("active");
    } else if (title == "Adm. de Producto") {
        $("#mod_admin").addClass("menu-open");
        $("#cont_admin").addClass("active");
        $("#adm-pro").addClass("active");
    } else if (title == "Adm. de Tokens de Seguridad") {
        $("#mod_admin").addClass("menu-open");
        $("#cont_admin").addClass("active");
        $("#adm-rest").addClass("active");
    } else if (title == "Adm. de Ventas") {
        $("#mod_admin").addClass("menu-open");
        $("#cont_admin").addClass("active");
        $("#adm-sal").addClass("active");
    } else if (title == "Adm. de Usuarios") {
        $("#mod_admin").addClass("menu-open");
        $("#cont_admin").addClass("active");
        $("#adm-use").addClass("active");
    }
}

function addPluginDaTable(table) {
    var temp = '#' + table;
    console.log(temp);
    $(temp).DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo(temp + '_wrapper .col-md-6:eq(0)');
}

/*                     Register form                   */

var myInput = document.getElementById("inputPassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message_password box
myInput.onfocus = function() {
    document.getElementById("message_password").style.display = "block";
}

// When the user clicks outside of the password field, hide the  box
myInput.onblur = function() {
    document.getElementById("message_password").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
}