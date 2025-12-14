async function cargarProductosTienda() {
    try {
        // Capturamos el valor del input (puede estar vacío)
        let dato = document.getElementById('busqueda_venta').value;
        const datos = new FormData();
        datos.append('dato', dato);

        let respuesta = await fetch(base_url + 'control/productosController.php?tipo=buscar_producto_venta', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();
        let contenidot = document.getElementById('contenedor_productos');

        // Limpiar el contenedor
        contenidot.innerHTML = ``;

        if (json.status && json.data && json.data.length > 0) {
            let cont = 1;

            json.data.forEach(producto => {
                // Imagen segura
                let imagen = producto.imagen
                    ? base_url + producto.imagen
                    : base_url + 'assets/img/no-image.png';

                // columna responsive
                let nueva_col = document.createElement("div");
                nueva_col.className = "col";

                nueva_col.innerHTML = `
                    <div class="card h-100 shadow-sm border-0 rounded-4" style="transition: all 0.3s;">
                        <img src="${imagen}" class="card-img-top" alt="${producto.nombre}"
                             style="height: 190px; object-fit: cover; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                        <div class="card-body d-flex flex-column p-4 text-center">
                            <h6 class="fw-bold text-dark mb-3" style="font-size: 1rem; line-height: 1.3;">
                                ${producto.nombre}
                            </h6>
                            <p class="text-success fw-bold fs-3 mb-2">S/ ${parseFloat(producto.precio).toFixed(2)}</p>
                            <p class="text-muted small mb-4">Stock: <strong>${producto.stock}</strong></p>
                            <div class="d-grid gap-2">
                                <button onclick="verDetalleProducto(${producto.id})"
                                        class="btn btn-warning btn-md text-white fw-bold shadow-sm">
                                    Ver detalles
                                </button>
                                <button onclick="agregar_producto_venta(${producto.id})"
                                        class="btn btn-primary btn-md fw-bold shadow">
                                    Agregar al carrito
                                </button>
                            </div>
                        </div>
                    </div>
                `;

                
                cont++;
                contenidot.appendChild(nueva_col);
                document.getElementById('id_producto_venta').value= producto.id;
                document.getElementById('producto_precio_venta').value= producto.precio;
                document.getElementById('producto_cantidad_venta').value= 1;
            });
        } else {
            contenidot.innerHTML = `
            <div class="col-12 text-center py-5">
            <h5 class="text-muted">
                        ${dato ? 'No se encontraron productos' : 'No hay productos registrados'}
                    </h5>
                </div>
            `;
        }

    } catch (e) {
        console.log('Error al cargar productos: ' + e);
    }
}

if(document.getElementById('contenedor_productos')){
    cargarProductosTienda();
}