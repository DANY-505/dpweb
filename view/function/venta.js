let productos_venta = {};
let id = 2;
let id2 = 4;
let producto = {};
producto.nombre = "Producto A";
producto.precio = 100;
producto.cantidad = 1;

let producto2 = {};
producto2.nombre = "Producto B";
producto2.precio = 200;
producto2.cantidad = 1;
// productos_venta.push

productos_venta[id] = producto;
productos_venta[id2] = producto2;
console.log(productos_venta);

async function agregar_producto_temporal(id_product = 0, price = 0, cantidad = 0) {
    if (id_product == 0) {
        id = document.getElementById("id_producto_venta").value;
    }else{
        id =  id_product;
    }
    if(price == 0){
        precio = document.getElementById("producto_precio_venta").value;
    }else{
        precio = price;
    }
    if(cantidad == 0){
        cantidad = document.getElementById("producto_cantidad_venta").value;
    }else{
        cantidad = cant;
    }
    const datos = new FormData();
    datos.append('id_producto', id);
    datos.append('precio', precio);
    datos.append('cantidad', cantidad);

    try {
        let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=registrarTemporal', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            if (json.msg == "registrado") {
                alert("producto registrado");

            } else {
                alert("producto actualizado");
            }
            cargarCarrito();
        }

    } catch (error) {
        console.log("error en agregar producto temporal " + error);

    }
}

async function cargarCarrito() {
    try {
        let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=listarVentaTemporales', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        json = await respuesta.json();
        if (json.status) {
            let lista_temporal = '';
            json.data.forEach(t_venta => {
                lista_temporal += `<tr>
                <td>${t_venta.nombre}</td>
                <td><input type="number" id="cant_${t_venta.id}" value="${t_venta.cantidad}" min="1" style="width: 60px;" onkeyup="actualizar_subtotal(${t_venta.id}, ${t_venta.precio});" onchange="actualizar_subtotal(${t_venta.id}, ${t_venta.precio});"></td>
                <td>S/. ${t_venta.precio}</td>
                <td id="subtotal_${t_venta.id}">S/. ${t_venta.cantidad * t_venta.precio}</td>
                <td><button class="btn btn-sm btn-danger" onclick="eliminarTemporalLista(${t_venta.id})">X</button></td>
            </tr>`
            });
            document.getElementById('lista_compra').innerHTML = lista_temporal;
            actualizar_subtotal_general();
        }

    } catch (error) {
        console.log("error en cargar carrito " + error);
    }
}



async function actualizar_subtotal(id, precio) {
    let cantidad = document.getElementById('cant_' + id).value;

    try {

        const datos = new FormData();
        datos.append('id', id);
        datos.append('cantidad', cantidad);
        let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=actualizarCantidad', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            subtotal = cantidad * precio;
            document.getElementById('subtotal_' + id).innerHTML = 'S/ ' + subtotal.toFixed(2);
            actualizar_subtotal_general();
        }

    } catch (error) {
        console.error("Error al actualizar el subtotal: ", error);

    }

}

async function actualizar_subtotal_general() {
    try {
        let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=listarVentaTemporales', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        json = await respuesta.json();
        if (json.status) {
            subtotal_general = 0;
            json.data.forEach(t_venta => {
                subtotal_general += (t_venta.precio * t_venta.cantidad)
            });
            igv = subtotal_general * 0.18;
            total = subtotal_general + igv;
            document.getElementById('subtotal_general').innerHTML = 'S/ ' + subtotal_general.toFixed(2);
            document.getElementById('igv_general').innerHTML = 'S/ ' + igv.toFixed(2);
            document.getElementById('total').innerHTML = 'S/ ' + total.toFixed(2);
        }

    } catch (error) {
        console.error("Error al actualizar el subtotal general: ", error);

    }

}

async function eliminarTemporalLista(id_temporal) {
    const datos = new FormData();
    datos.append('id', id_temporal);
    try {
        let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=eliminarDelCarrito', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            console.log(json.msg);
        }else{
            console.error(json.msg);
        }
    }catch (error) {
        console.log("error al eliminar temporal " + error);
    }
    cargarCarrito();
}

async function buscar_cliente_venta() {
    let dni = document.getElementById('cliente_dni').value;
    try {
        const datos = new FormData();
        datos.append('dni', dni);
        let respuesta = await fetch(base_url + 'control/usuarioController.php?tipo=buscarPorDni', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            document.getElementById('cliente_nombre').value = json.data.razon_social;
            document.getElementById('id_cliente_venta').value = json.data.id;
            
        } else {
            alert(json.msg);
        }
    } catch (error) {
        console.log("error al bauscar cliente" + error);
    }
    
}
async function registrar_venta() {
    let id_cliente = document.getElementById('id_cliente_venta').value;
    let fecha_venta = document.getElementById('fecha_venta').value;
    if(id_cliente == '' || fecha_venta == ''){
        alert("debe ingresar todos los campos");
        return;
    }

    try {
        const datos = new FormData();
        datos.append('id_cliente', id_cliente);
        datos.append('fecha_venta', fecha_venta);

        let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=registrar_venta', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            alert("venta registrada con exito");
            window.location.reload();
            
        } else {
            alert(json.msg);
        }
    } catch (error) {
        console.log("error al registrar venta " + error);
    }
    
}

