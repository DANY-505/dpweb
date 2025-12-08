<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fernandez</title>

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/css/style.css">

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
    <!-- Sidebar Toggle Button -->
    <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>

    <!-- Left Sidebar Navbar -->
    <nav class="sidebar" id="sidebar">
        <div class="navbar-brand">LOGO</div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>home">
                    <i class="bi bi-house"></i>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>users">
                    <i class="bi bi-person-square"></i>
                    Users
                </a>
            </li>
            
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>clientes-list">
                    <i class="bi bi-people"></i>
                    Clients
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>categorias-lista">
                    <i class="bi bi-menu-button-wide-fill"></i>
                    Categories
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>productos-lista">
                    <i class="bi bi-box-seam"></i>
                    Products
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>productos-vista">
                    <i class="bi bi-eye"></i>
                    Products View
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>proveedor-list">
                    <i class="bi bi-file-person"></i>
                    Proveedor
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-shop"></i>
                    Shops
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-cart3"></i>
                    Sales
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear"></i>
                    Menu
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><a class="dropdown-item" href="#">Cerrar Sesion</a></li>
                </ul>
            </li>
        </ul>
    </nav>
