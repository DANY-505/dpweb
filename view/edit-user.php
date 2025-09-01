<div class="container" style="margin-top: 50px;">
    <div class="card">
        <div class="card-header" style="text-align:center;">
            Editar Usuario
            <?php
            if (isset($_GET["views"])) {
                $ruta = explode("/", $_GET["views"]);
                echo $ruta[1];
            }
            ?>
        </div>
        <form id="frm_edit_user" method="POST" action="">
            <input type="hidden" name="id_persona" id="id_persona" value="<?= $ruta[1]; ?>">
            <div class="card-body">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label>DNI</label>
                    <input type="number" class="form-control" name="nro_identidad" value="" required>
                </div>
                <div class="form-group">
                    <label>Nombres y Apellidos</label>
                    <input type="text" class="form-control" name="razon_social" value="" required>
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" class="form-control" name="correo" value="" required>
                </div>
                <div class="form-group">
                    <label>Departamento</label>
                    <input type="text" class="form-control" name="departamento" value="" required>
                </div>
                <div class="form-group">
                    <label>Provincia</label>
                    <input type="text" class="form-control" name="provincia" value="" required>
                </div>
                <div class="form-group">
                    <label>Distrito</label>
                    <input type="text" class="form-control" name="distrito" value="" required>
                </div>
                <div class="form-group">
                    <label>Codigo Postal</label>
                    <input type="number" class="form-control" name="cod_postal" value="" required>
                </div>
                <div class="form-group">
                    <label>Direccion</label>
                    <input type="text" class="form-control" name="direccion" value="" required>
                </div>
                <div class="form-group">
                    <label>Rol</label>
                    <select name="rol" class="form-control" required>
                        <option value="">Seleccionar rol</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="invit">Invitado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <select name="estado" class="form-control" required>
                        <option value="">Seleccionar estado</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <div class="m-3" style="display: flex; justify-content:center; gap: 20px">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="<?php echo BASE_URL; ?>users" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo BASE_URL; ?>view/function/user.js"></script>
<script>
    edit_user();
</script>