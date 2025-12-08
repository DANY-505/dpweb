<div class="container-fluid py-4 px-2 px-md-4">
  <h3 class="titulo-principal text-center mb-4"
    style="color: #000080; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
    NUESTROS PRODUCTOS
  </h3>

  <!-- Barra de búsqueda -->
  <div class="row mb-4 align-items-center g-3">
    <div class="col-lg-3 col-md-4">
      <h5 class="mb-0 fw-bold text-primary">Búsqueda de productos</h5>
    </div>
    <div class="col-lg-9 col-md-8">
      <input id="busqueda_venta" type="text" class="form-control form-control-lg shadow-sm"
        placeholder="Buscar por nombre o código..." onkeyup="cargarProductosTienda();"
        style="border: 2px solid #007bff; border-radius: 12px;">

      <input type="hidden" id="id_producto_venta">
      <input type="hidden" id="producto_precio_venta">
      <input type="hidden" id="producto_cantidad_venta" value="1">
    </div>
  </div>

  <div class="row g-4">
    <!-- PRODUCTOS - Ahora ocupan más espacio y se ven hermosos -->
    <div class="col-xl-8 col-lg-8 col-md-12">
      <div class="card shadow-lg border-0 h-100">
        <div class="card-body p-4">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4"
            id="contenedor_productos">
            <!-- Aquí se cargan las tarjetas -->
          </div>
        </div>
      </div>
    </div>

    <!-- CARRITO DE COMPRA - Crece dinámicamente y siempre visible el total abajo -->
    <div class="col-xl-4 col-lg-4 col-md-12">
      <div class="card shadow-lg border-0 sticky-top" style="top: 20px;">
        <div class="card-header bg-primary text-white text-center py-3">
          <h4 class="mb-0 fw-bold">LISTA DE COMPRA</h4>
        </div>
        <div class="card-body d-flex flex-column p-0">
          <!-- Tabla que crece sola -->
          <div class="table-responsive" style="flex: 1; min-height: 200px;">
            <table class="table table-hover mb-0 text-center align-middle" style="font-size: 0.9rem;">
              <thead class="table-dark">
                <tr>
                  <th>Producto</th>
                  <th>Cant.</th>
                  <th>Precio</th>
                  <th>SubT.</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="lista_compra" class="table-group-divider">
                <!-- Productos del carrito aquí -->
              </tbody>
            </table>
            <!-- Mensaje cuando está vacío -->
            <div id="carrito_vacio" class="text-center py-5 text-muted d-none">
              <i class="bi bi-cart3" style="font-size: 3rem;"></i>
              <p class="mt-3 mb-0">El carrito está vacío</p>
            </div>
          </div>

          <!-- Totales siempre fijos abajo -->
          <div class="border-top bg-light p-3 mt-auto">
            <div class="d-flex justify-content-between mb-2">
              <strong>Subtotal:</strong>
              <span id="subtotal_total">S/ 0.00</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <strong>IGV (18%):</strong>
              <span id="igv_total">S/ 0.00</span>
            </div>
            <hr class="my-2">
            <div class="d-flex justify-content-between mb-3">
              <h4 class="mb-0">Total:</h4>
              <h4 class="mb-0 text-primary fw-bold" id="total_final">S/ 0.00</h4>
            </div>
            <button class="btn btn-success btn-lg w-100 shadow" id="btn_realizar_venta">
              <i class="bi bi-credit-card"></i> Realizar Venta
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo BASE_URL; ?>view/function/productos_vista.js"></script>
<script src="<?php echo BASE_URL; ?>view/function/producto.js"></script>
<script src="<?php echo BASE_URL; ?>view/function/venta.js"></script>
<script>
  let input = document.getElementById("busqueda_venta");
  input.addEventListener('keydown', (event) => {
    if (event.key == 'Enter') {
      agregar_producto_temporal();
    }
  });

  window.onload = function() {
    cargarProductosTienda();
    cargarCarrito();
  };
</script>