<?php
require_once("../model/VentaModel.php");
require_once("../model/ProductsModel.php");

$objProducto = new ProductsModel();
$objVenta = new VentaModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrarTemporal") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $id_producto = $_POST['id_producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $b_producto = $objVenta->buscarTemporal($id_producto);

    if ($b_producto) {
        $n_cantidad = $b_producto->cantidad+1;
        $objVenta->actualizarCantidadTemporal($id_producto, $n_cantidad);
        $respuesta = array('status' => true, 'msg' => 'actualizado');
    }else{
        $registro = $objVenta->registrarTemporal($id_producto, $precio, $cantidad);
        $respuesta = array('status' => true, 'msg' => 'registrado');
    }
    echo json_encode($respuesta);
}

if ($tipo == "listarTemporales") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $temporales = $objVenta->buscarTemporales();
    if ($temporales) {
        $respuesta = array('status' => true, 'msg' => '', 'data' => $temporales);
    } else {
        $respuesta = array('status' => false, 'msg' => 'no se encontraron productos');
    }
    echo json_encode($respuesta);
    exit;
}

if ($tipo == "cambiarCantidad") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $id_producto = $_POST['id_producto'];
    $accion = $_POST['accion'];

    $item = $objVenta->buscarTemporal($id_producto);

    if ($item) {
        if ($accion == "aumentar") {
            $nueva_cantidad = $item->cantidad + 1;
        } else {
            $nueva_cantidad = $item->cantidad - 1;
            if ($nueva_cantidad < 1) {
                // NO eliminamos, solo dejamos en 1
                $nueva_cantidad = 1;
                $respuesta = array('status' => true, 'msg' => 'cantidad minima alcanzada');
                echo json_encode($respuesta);
                exit;
            }
        }
        $objVenta->actualizarCantidadTemporal($id_producto, $nueva_cantidad);
        $respuesta = array('status' => true, 'msg' => 'cantidad actualizada');
    } else {
        $respuesta = array('status' => false, 'msg' => 'producto no encontrado en temporal');
    }
    echo json_encode($respuesta);
    exit;
}

if ($tipo == "eliminarDelCarrito") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $id_temporal = $_POST['id'];

    $eliminar = $objVenta->eliminarTemporal($id_temporal);
    if ($eliminar) {
        $respuesta = array('status' => true, 'msg' => 'Producto eliminado del carrito');
    } else {
        $respuesta = array('status' => false, 'msg' => 'Error al eliminar');
    }
    echo json_encode($respuesta);
    exit;
}