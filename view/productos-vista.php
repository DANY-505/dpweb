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
                  <th>P. Unit</th>
                  <th>SubTotal</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="lista_compra" class="table-group-divider">
                <!-- Productos del carrito aquí -->
              </tbody>
            </table>
          </div>

          <!-- Totales siempre fijos abajo -->
          <div class="border-top bg-light p-3 mt-auto">
            <div class="d-flex justify-content-between mb-2">
              <h5>Subtotal:<label id="subtotal_general"></label></h5>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <h5>IGV (18%):<label id="igv_general"></label></h5>
            </div>
            <hr class="my-2">
            <div class="d-flex justify-content-between mb-3">
              <h5 class="mb-0">Total:<label class="mb-0 text-primary fw-bold" id="total"></label></h5>
            </div>

            <button type="button" class="btn btn-success btn-lg w-100 shadow" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="bi bi-credit-card"></i> Realizar Venta
            </button>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Realizar Venta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_venta">
          <div class="row">
            <div class="col-md-6">
              <label for="cliente_dni" class="form-label">DNI del Cliente</label>
              <input type="text" name="cliente_dni" id="cliente_dni" class="form_control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" $ maxlength="8" required>
            </div>

            <div class="col-md-6">
              <button type="button" class="btn btn-primary mt-4" onclick="buscar_cliente_venta();">Buscar Cliente</button>
            </div>

            <div class="col-md-12">
              <label for="cliente_nombre" class="form-label">Nombre del Cliente</label>
              <div class="col-md-12">
                <input type="text" name="cliente_nombre" id="cliente_nombre" class="form_control" readonly>
                <input type="hidden" class="form-control" id="id_cliente_venta">
              </div>
            </div>

            <div class="col-md-4">
              <label for="fecha_venta">Fecha de venta</label>
              <input type="datetime" name="fecha_venta" id="fecha_venta" class="form-control" value="<?= date('Y-m-d H:i') ?>">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="registrar_venta();">Registrar Venta</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo BASE_URL; ?>view/function/productos_vista.js"></script>
<script src="<?php echo BASE_URL; ?>view/function/venta.js"></script>
<script>
  let input = document.getElementById("busqueda_venta");
  input.addEventListener('keydown', (event) => {
    if (event.key == 'Enter') {
      agregar_producto_temporal();
    }
  });
  cargarCarrito();
  actualizar_subtotal_general();
</script>