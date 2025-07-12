
function validar_form() {
    let nro_documento = document.getElementById("nro_identidad").value;
    let razon_social = document.getElementById("razon_social").value;
    let telefono = document.getElementById("telefono").value;
    let correo = document.getElementById("correo").value;
    let departamento = document.getElementById("departamento").value;
    let provincia = document.getElementById("provincia").value;
    let distrito = document.getElementById("distrito").value;
    let cod_postal = document.getElementById("cod_postal").value;
    let direccion = document.getElementById("direccion").value;
    let rol = document.getElementById("rol").value;

    if (nro_documento=="" || razon_social=="" || telefono=="" || correo=="" || correo=="" || departamento=="" || provincia=="" || distrito=="" || cod_postal=="" || direccion=="" || rol=="") {
       
         Swal.fire({
            icon: 'warning',
            title: 'Campos vacíos',
            text: 'Por favor, complete todos los campos requeridos',
            confirmButtonText: 'Entendido'
        });
        return;
    }
    registrarUsuario();
}

if(document.querySelector('#frm_user')){
    //evita que se envie el formulario
    let frm_user = document.querySelector('#frm_user');
    frm_user.onsubmit = function(e){
        e.preventDefault();
        validar_form();
    }
}

async function registrarUsuario() {
    try {
        const datos = new FormData(frm_user);
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.msg) {
            Swal.fire({
                icon: "success",
                title: "Éxito",
                text: json.msg
            });
            document.getElementById('frm_user').reset();
        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: json.msg
            });
        }
    } catch (error) {
        console.log("Error al registrar categoría: " + error);
    }
}

function cancelar() {
    Swal.fire({
        icon: "warning",
        title: "¿Estás seguro?",
        text: "Se cancelará el registro",
        showCancelButton: true,
        confirmButtonText: "Sí, cancelar",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = base_url + "?views=home";
        }
    });
}

async function iniciar_sesion() {
    let usuario  = document.getElementById("username").value;
    let password  = document.getElementById("password").value;

    if(usuario == "" || password == ""){
        Swal.fire({
                icon: "error",
                title: "Error",
                text: "Campos vacios",
            });
        return;
    }
    try {
        const datos = new FormData(frm_login);
        let respuesta = await fetch(base_url + 'control/usuarioController.php?tipo=iniciar_sesion', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        // validamos que json.status sea = true
        if (json.status) { // true
            location.replace(base_url + 'new-user');
        }else{
           Swal.fire({
                icon: "error",
                title: "Error",
                text: json.msg
            });
        }
    } catch (error) {
        console.log(error);
    }
 
}