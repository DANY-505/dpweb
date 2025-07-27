


<div class="container">
    <h5 class="mt-3 text-center" style="background: black; color: white; font-style: italic">Editar Usuario</h5>
    <form id="frm_edit_user" method="POST" action="">
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
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?php echo BASE_URL; ?>users" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<script src="<?php echo BASE_URL; ?>view/function/user.js"></script>
