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

if ($tipo =="listarVentaTemporales") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $b_producto = $objVenta->buscarTemporales();
    if ($b_producto) {
        $respuesta = array('status' => true, 'msg' => '', 'data' => $b_producto);
    } else {
        $respuesta = array('status' => true, 'msg' => 'no se encontraron productos', 'data' => array());
    }
    echo json_encode($respuesta);
}

if($tipo=="actualizarCantidad"){
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $consulta = $objVenta->actualizarCantidadTemporalByid($id, $cantidad);
    if($consulta){
        $respuesta = array('status' => true, 'msg' => 'success');
    }else{
        $respuesta = array('status' => false, 'msg' => 'error');
    }
    echo json_encode($respuesta);
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
}

