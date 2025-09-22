<?php
require_once("../model/ProductsModel.php");
require_once("../model/CategoriaModel.php");


$objProducto = new ProductsModel();
$objCategoria = new CategoriaModel();

if ($tipo == 'registrar') {
    // Captura los campos del formulario
    $codigo = $_POST['codigo'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $detalle = $_POST['detalle'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $fecha_vencimiento = $_POST['fecha_vencimiento'] ?? '';
    $id_categoria = $_POST['id_categoria'] ?? '';
    //$id_proveedor = $_POST['id_proveedor'] ?? null; // Proveedor es opcional

    // Validar campos obligatorios (excluyendo id_proveedor)
    if ($codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $fecha_vencimiento == "" || $id_categoria == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacíos');
        echo json_encode($arrResponse);
        exit;
    }

    // Validar la imagen
    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        $arrResponse = array('status' => false, 'msg' => 'Error, imagen no recibida');
        echo json_encode($arrResponse);
        exit;
    }

    // Validar si el código ya existe
    if ($objProducto->existeCodigo($codigo) > 0) {
        $arrResponse = array('status' => false, 'msg' => 'Error, el código ya existe');
        echo json_encode($arrResponse);
        exit;
    }

    // Validar formato y tamaño de la imagen
    $file = $_FILES['imagen'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $extPermitidas = ['jpg', 'jpeg', 'png'];

    if (!in_array($ext, $extPermitidas)) {
        $arrResponse = array('status' => false, 'msg' => 'Formato de imagen no permitido');
        echo json_encode($arrResponse);
        exit;
    }

    if ($file['size'] > 5 * 1024 * 1024) { // 5MB
        $arrResponse = array('status' => false, 'msg' => 'La imagen supera 5MB');
        echo json_encode($arrResponse);
        exit;
    }

    // Guardar la imagen con un nombre único
    $carpetaUploads = "../Uploads/productos/";
    if (!is_dir($carpetaUploads)) {
        @mkdir($carpetaUploads, 0775, true);
    }

    $nombreUnico = uniqid('prod_') . '.' . $ext;
    $rutaFisica = $carpetaUploads . $nombreUnico;
    $rutaRelativa = "uploads/productos/" . $nombreUnico;

    if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
        $arrResponse = array('status' => false, 'msg' => 'No se pudo guardar la imagen');
        echo json_encode($arrResponse);
        exit;
    }

    // Validar si id_categoria existe
    $objCategoria = new CategoriaModel();
    $categoria = $objCategoria->obtenerCategoriaPorId($id_categoria);
    if (!$categoria) {
        $arrResponse = array('status' => false, 'msg' => 'Error, la categoría no existe');
        echo json_encode($arrResponse);
        exit;
    }

    // Registrar el producto
    $id = $objProducto->registrar($codigo, $nombre, $detalle, $precio, $stock, $fecha_vencimiento, $rutaRelativa, $id_categoria, $id_proveedor);
    if ($id > 0) {
        $arrResponse = array('status' => true, 'msg' => 'Registrado correctamente', 'id' => $id, 'img' => $rutaRelativa);
    } else {
        @unlink($rutaFisica); // Revertir archivo si falló la BD
        $arrResponse = array('status' => false, 'msg' => 'Error, fallo en registro');
    }

    echo json_encode($arrResponse);
    exit;
}

if ($tipo == "mostrar_productos") {
    $productos = $objProducto->mostrarProductos();
    header('Content-Type: application/json');
    echo json_encode($productos);
}

if ($tipo == "ver") {
    $respuesta = array('status' => false, 'msg' => '');
    $id_producto = $_POST['id_producto'];
    $producto = $objProducto->ver($id_producto);
    if($producto){
        $respuesta ['status'] = true;
        $respuesta ['data'] = $producto;
    }else {
        $respuesta['msg'] = "Error, categoria no existe";
    }
    echo json_encode($respuesta);
}


if ($tipo == "actualizar") {
    $id_producto = $_POST['id_producto'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_categoria = $_POST['id_categoria'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];

    if ($id_producto == "" || $codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $id_categoria == "" || $fecha_vencimiento == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    }else {
        $existeID = $objProducto->ver($id_producto);
        if(!$existeID){
            $arrResponse = array('status' =>false, 'msg' => 'Error, categoria no existe');
            echo json_encode($arrResponse);
            exit; 
        }else {
            $actualizar = $objProducto->actualizar($id_producto, $codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento);
            if($actualizar){
                $arrResponse = array('status' => true, 'msg' => 'Actualizado correctamente');
                
            }else {
                $arrResponse = array('status' => false, 'msg' => $actualizar);  
            }
            echo json_encode($arrResponse);
            exit;
        }
    }
}

if($tipo == "eliminar"){
    $id_producto = $_POST['id_producto'];
    if($id_producto == ""){
        $arrResponse = array('status' => false, 'msg' => 'Error, id vacio');
    }else{
        $eliminar = $objProducto->eliminar($id_producto);
        if ($eliminar) {
            $arrResponse = array('status' => true, 'msg' => 'Producto eliminado');
        }else{
            $arrResponse = array('status' => false, 'msg' => 'Error al eliminar producto');
        }
        echo json_encode($arrResponse);
        exit;
    }
}