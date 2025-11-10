
async function cargarProductosTienda() {
    try {
        const respuesta = await fetch(base_url + 'control/productosController.php?tipo=mostrar_productos_vista', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        const json = await respuesta.json();
        const contenedor = document.getElementById('contenedor_productos');
        if (!json.status || !json.data || Object.keys(json.data).length === 0) {
            contenedor.innerHTML = `<div class="col-12 text-center"><h4 class="text-muted">No hay productos disponibles</h4></div>`;
            return;
        }

        let html = '';

        for (const categoria in json.data) {
            const productos = json.data[categoria];
            html += `
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="text-center mb-4 text-primary fw-bold">${categoria}</h3>
                </div>
            `;

            productos.forEach(p => {
                const imagen = p.imagen ? base_url  + p.imagen : 'https://via.placeholder.com/300x200?text=Sin+Imagen';

                html += `
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="${imagen}" class="card-img-top" alt="${p.nombre}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fs-6">${p.nombre}</h5>
                            <p class="card-text text-muted small">Categoría: ${p.categoria}</p>
                            <p class="card-text text-success fw-bold">$${parseFloat(p.precio).toFixed(2)}</p>
                            <div class="mt-auto d-flex gap-1">
                                <a href="${base_url}producto-detalle/${p.id}" class="btn btn-outline-primary btn-sm flex-fill">Ver Detalle</a>
                                <button onclick="agregarAlCarrito(${p.id})" class="btn btn-success btn-sm flex-fill">Añadir al Carrito</button>
                            </div>
                        </div>
                    </div>
                </div>`;

            });

            html += `</div>`; 
        }

        contenedor.innerHTML = html;

    } catch (error) {
        console.error(error);
        document.getElementById('contenedor_productos').innerHTML = `<div class="col-12 text-center">Error al cargar los productos</div>`;
    }

}
document.addEventListener('DOMContentLoaded', () => {
    cargarProductosTienda();
});


alert("the work is you");

let productos_venta = {};

let id = 2;
let id2= 4;

let producto = {};
producto.nombre = "producto A";
producto.precio = 100;
producto.cantidad = 3;


let producto2= {};
producto2.nombre = "producto B";
producto2.precio = 80;
producto2.cantidad = 2;

productos_venta.id2 = producto2;
productos_venta.id = producto;

//productos_venta.splice(id,1);
console.log(productos_venta);
