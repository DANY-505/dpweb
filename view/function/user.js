
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

    if (nro_documento == "" || razon_social == "" || telefono == "" || correo == "" || correo == "" || departamento == "" || provincia == "" || distrito == "" || cod_postal == "" || direccion == "" || rol == "") {

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

if (document.querySelector('#frm_user')) {
    //evita que se envie el formulario
    let frm_user = document.querySelector('#frm_user');
    frm_user.onsubmit = function (e) {
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
    let usuario = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (usuario == "" || password == "") {
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
        } else {
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

async function view_users() {
    try {
        let respuesta = await fetch(base_url + 'control/usuarioController.php?tipo=mostrar_usuarios', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        let json = await respuesta.json();
        if (json && json.length > 0) {
            let html = '';
            json.forEach((user, index) => {
                html += `<tr>
                    <td>${index + 1}</td>
                    <td>${user.nro_identidad || ''}</td>
                    <td>${user.razon_social|| ''}</td>
                    <td>${user.correo ||''}</td> 
                    <td>${user.rol ||''}</td> 
                    <td>${user.estado || ''}</td>
                    <td>
                        <a href="`+ base_url + `edit_user/`+user.id+`" class="btn btn-primary">Editar</a>
                    </td>
                </tr>`;
            });
            document.getElementById('content_users').innerHTML = html;
        } else {
            document.getElementById('content_users').innerHTML = '<tr><td colspan="6">No hay usuarios disponibles</td></tr>';
        }
    } catch (error) {
        console.log(error);
        document.getElementById('content_users').innerHTML = '<tr><td colspan="6">Error al cargar los usuarios</td></tr>';
    }
}

if (document.getElementById('content_users')) {
    view_users();
}

async function edit_user() {
    const pathArray = window.location.pathname.split('/');
    let id = pathArray[pathArray.length - 1];
    if (!id || isNaN(id)) {
        const urlParams = new URLSearchParams(window.location.search);
        const queryId = urlParams.get('id');
        if (!queryId) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se encontró ID de usuario'
            });
            return;
        }
        id = queryId;
    }
    try {
        let respuesta = await fetch(base_url + 'control/usuarioController.php?tipo=obtener_usuario', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id=' + encodeURIComponent(id)
        });

        let response = await respuesta.json();
        if (response.status && response.data) {
            const user = response.data;
            const form = document.getElementById('frm_edit_user');
            if (form) {
                if (form.elements['id']) form.elements['id'].value = user.id || id;
                if (form.elements['nro_identidad']) form.elements['nro_identidad'].value = user.nro_identidad || '';
                if (form.elements['razon_social']) form.elements['razon_social'].value = user.razon_social || '';
                if (form.elements['correo']) form.elements['correo'].value = user.correo || '';
                if (form.elements['rol']) form.elements['rol'].value = user.rol || '';
                if (form.elements['estado']) form.elements['estado'].value = user.estado || '';
            }
            
        }else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Usuario no encontrado'
            });
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error al cargar los datos del usuario'
        });
    }
}


async function update_user() {
    const form = document.getElementById('frm_edit_user');
    const formData = new FormData(form);
    if (!formData.get('id')) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'ID de usuario no encontrado'
        });
        return;
    }

    try {
        let respuesta = await fetch(base_url + 'control/usuarioController.php?tipo=actualizar_usuario', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: formData
        });
        let json = await respuesta.json();
        if (json.status) {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: json.msg
            }).then(() => {
                window.location.href = base_url + 'users';
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: json.msg
            });
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error al actualizar el usuario'
        });
    }
}

if (document.getElementById('frm_edit_user')) {
    edit_user();

    let frm_edit_user = document.getElementById('frm_edit_user');
    frm_edit_user.onsubmit = function (e) {
        e.preventDefault();
        update_user();
    };
}
