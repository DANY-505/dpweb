<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-center" style="color: #000080; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">LISTA DE PROVEEDORES</h1>
        <button class="btn btn-add-new" onclick="window.location.href='<?php echo BASE_URL; ?>proveedor-new'">
            <i class="bi bi-plus"></i> Agregar Nuevo
        </button>
    </div>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>Nro</th>
                <th>DNI</th>
                <th>Nombres y Apellidos</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody id="content_proveedor">


        </tbody>
    </table>
</div>
<script src="<?= BASE_URL ?>view/function/proveedor.js"></script>
<!--<script>view_users();</script>-->