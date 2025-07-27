<?php
require_once("../library/conexion.php");
class UsuarioModel{
    private $conexion;
    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password ) {
        $consulta = "INSERT INTO persona (nro_identidad, razon_social, telefono, correo, departamento, provincia, distrito, cod_postal, direccion, rol, password) VALUE('$nro_identidad', '$razon_social', '$telefono', '$correo', '$departamento', '$provincia', '$distrito', '$cod_postal', '$direccion', '$rol', '$password')";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            $sql = $this->conexion->insert_id;
        }else{
            $sql = 0;
        }
        return $sql;
    }

    public function existePersona($nro_identidad){
        $consulta = "SELECT * FROM persona WHERE nro_identidad='$nro_identidad'";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;

    }

    public function buscarPersonaPorNroIdentidad($nro_identidad){
        $consulta = "SELECT  id, razon_social, password FROM persona WHERE nro_identidad='$nro_identidad' LIMIT 1";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    public function mostrarUsuarios(){
        $arr_usuarios = array();
        $consulta = "SELECT * FROM persona";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_usuarios, $objeto);
        }
        return $arr_usuarios;
    }

    public function obtenerUsuarioPorId($id) {
        if (!is_numeric($id) || $id <= 0) {
            return false;
        }
        $consulta = "SELECT id, nro_identidad, razon_social, correo, rol, estado FROM persona WHERE id = ? LIMIT 1";
        $stmt = $this->conexion->prepare($consulta);
        if(!$stmt){
            error_log("error en prepare(): " . $this->conexion->error);
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado && $resultado->num_rows > 0) {
            $usuario = $resultado->fetch_object();
            $stmt->close();
            return $usuario;
        }
        $stmt->close();
        return false;
    }

    public function actualizarUsuario($id, $nro_identidad, $razon_social, $correo, $rol, $estado) {
        if (!is_numeric($id) || $id <= 0) {
            return false;
        }
        if(empty($nro_identidad) || empty($razon_social) || empty($correo)){
            return false;
        }
        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        if(!in_array($rol, ['user', 'admin', 'invit'])){
            return false;
        }
        if(!in_array($estado, ['0', '1', 0, 1])){
            return false;
        }
        if(!$this->obtenerUsuarioPorId($id)){
            return false;
        }

        $consulta = "UPDATE persona SET nro_identidad= ?, razon_social= ?, correo= ?, rol= ?, estado= ? WHERE id= ?";
        $stmt = $this->conexion->prepare($consulta);

        if (!$stmt) {
            error_log("error en prepare(): " . $this->conexion->error);
            return false;
        }
        $stmt->bind_param("ssssii", $nro_identidad, $razon_social, $correo, $rol, $estado, $id);
        $resultado = $stmt->execute();

        if (!$resultado) {
            error_log("error en execute(): " . $stmt->error);
            $stmt->close();
            return false;
        }
        $filasAfectadas = $stmt->affected_rows;
        $stmt->close();
        return $filasAfectadas > 0; 
    }

    public function existeCorreoEnOtroUsuario($correo, $excluirId){
        $consulta = "SELECT id FROM persona WHERE correo = ? AND id != ? LIMIT 1";
        $stmt = $this->conexion->prepare($consulta);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("si", $correo, $excluirId);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $existe = $resultado->num_rows > 0;
        $stmt->close();
        return $existe;
        
    }

    public function existeIdentidadEnOtroUsuario($nro_identidad, $excluirId){
        $consulta = "SELECT id FROM persona WHERE nro_identidad = ? AND id != ? LIMIT 1";
        $stmt = $this->conexion->prepare($consulta);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("si", $nro_identidad, $excluirId);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $existe = $resultado->num_rows > 0;
        $stmt->close();
        return $existe;
    }
}
