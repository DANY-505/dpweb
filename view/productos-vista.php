<!--<div>
  <h3>MIS PRODUCOS</h3>
  <div class="col-9">

  </div>
  <div id="contenedor_productos" class="row mt-5"></div>
</div>
-->

<div class="container-fluid mt-4">
  <h2>Ventas</h2>
  <div class="row">
    <div class="col-9">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">busqueda de productos</h5>
          <div class="row" id="contenedor_productos"></div>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Carrito</h5>
          <div class="row" style="min-height: 500px;">
            <div class="col-12">
              <table class="table">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>SubTotal</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo BASE_URL; ?>view/function/productos_vista.js"></script>