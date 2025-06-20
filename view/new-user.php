<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fernandez</title>
    <link rel="stylesheet" href="<?php

use Soap\Url;

 echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script>
        const base_url = '<?php echo BASE_URL;?>';
    </script>
    
    <style>
        .bi{
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;

        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <i class="bi bi-house"></i>
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <i class="bi bi-person-square"></i>
                            <a class="nav-link" href="#">Users</a>
                        </li>
                        <li class="nav-item">
                            <i class="bi bi-box-seam"></i>
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <i class="bi bi-menu-button-wide-fill"></i>
                            <a class="nav-link" href="#">Categories</a>
                        </li>
                        <li class="nav-item">
                            <i class="bi bi-people"></i>
                            <a class="nav-link" href="#">Clients</a>
                        </li>
                        <li class="nav-item">
                            <i class="bi bi-shop"></i>
                            <a class="nav-link" href="#">Shops</a>
                        </li>
                        <li class="nav-item">
                            <i class="bi bi-cart3"></i>
                            <a class="nav-link" href="#">Sales</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Menu
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                                    <li><a class="dropdown-item" href="#">Ajustes</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Cerrar Sesion</a></li>
                                </ul>
                            </li>

                        </ul>

                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="container" style="margin-top: 100px;">
        <div class="card">
            <div class="card-header" style="text-align:center;">
                Registro de Usuario
            </div>
            <form id="frm_user" action="" method="">
                <div class="card-body">

                    <div class="mb-3 row">
                        <label for="nro_identidad" class="col-sm-2 col-form-label">Nro de Documento</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nro_identidad" name="nro_identidad" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="razon_social" class="col-sm-2 col-form-label">Nombre/Razon Social</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="razon_social" name="razon_social" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="telefono" name="telefono"required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="correo" name="correo"required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="departamento" class="col-sm-2 col-form-label">Departamento</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="departamento" name="departamento"required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="provincia" class="col-sm-2 col-form-label">Provincia</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="provincia" name="provincia"required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="distrito" class="col-sm-2 col-form-label">Distrito</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="distrito" name="distrito"required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="cod_postal" class="col-sm-2 col-form-label">Codigo Postal</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="cod_postal" name="cod_postal"required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="direccion" class="col-sm-2 col-form-label">Direccion</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion" name="direccion"required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="rol" class="col-sm-2 col-form-label">Rol</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="rol" name="rol">
                                <option value="" disabled selected>seleccione</option>
                                <option value="admin">Administrador</option>
                                <option value="user">Usuario</option>
                                <option value="invit">Invitado</option>
                            </select>
                        </div>
                    </div>

                    <div style="display: flex; justify-content:center; gap:20px">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <button type="reset" class="btn btn-info">Limpiar</button>
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <script src="<?php echo BASE_URL; ?>view/function/user.js"></script>
    <script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>