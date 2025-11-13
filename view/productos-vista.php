<div class="container-fluid mt-4">
  <h4 class="titulo-principal text-center">
        NUESTROS PRODUCTOS
    </h4>
  <div class="row">
    <div class="col-lg-9 col-md-8 col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row" id="contenedor_productos"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mt-3 mt-md-0">
      <div class="card">
        <div class="card-body">
                <h5 class="titulo-carrito">Lista de Compra</h5>
                <div class="row" style="min-height: 500px;">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>SubTotal</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="lista_compra">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-end">
                        <button class="btn btn-success btn-sm">Realizar Venta</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo BASE_URL; ?>view/function/productos_vista.js"></script>


