<?php
class viewModel{
    protected static function get_view($view){
        $white_list = ["home", "users","new-user", "edit-user", "new-categoria", "categorias-lista", 
        "categorias-edit", "new-producto", "productos-lista", "productos-edit", "productos-vista", "proveedor-new", "proveedor-edit", "proveedor-list",
        "clientes-new", "clientes-list", "clientes-edit"];
        if (in_array($view, $white_list)) {
            if (is_file("./view/".$view.".php")) {
                $content = "./view/".$view.".php";
            }else{
                $content = "404";
            }
        }elseif($view == "login"){ 
            $content = "login";
        }else{
            $content = "404";
        }
         return $content;
    }
}
