<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-center" style="color: #000080; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">LISTA DE CATEGORIAS</h1>
        <button class="btn btn-add-new" onclick="window.location.href='<?php echo BASE_URL; ?>new-categoria'">
            <i class="bi bi-plus"></i> Agregar Nuevo
        </button>
    </div>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody id="content_categorias">
        </tbody>

    </table>
</div>

<script src="<?php echo BASE_URL; ?>view/function/categoria.js"></script>