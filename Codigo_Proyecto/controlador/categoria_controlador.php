<?php 
require_once "modelo/categoria_modelo.php";
class categoria_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }

public function index(){
    $this->vista->datos= categoria_modelo::mdlListado();
    $this->vista->estructura("categoria/index");
}

public function frmRegistrar(){
    $this->vista->estructura("categoria/frmRegistrar");

}

public function registrar(){
    extract($_POST);
    $datos["cat_id_categoria"]     = $cat_id_categoria;
    $datos["cat_nombre"]           = $cat_nombre;
    $datos["cat_descripcion"]      = $cat_descripcion;
    $r                             = categoria_modelo::mdlRegistrar($datos);
    if($r > 0){
        echo "Registro exitoso!";
    }

}

public function frmEditar(){
    $cod = $_GET["cod"];
    $this->vista->datos = categoria_modelo::mdlConsultarXcod($cod);
    $this->vista->estructura("categoria/frmEditar");
}

public function editar(){
    extract($_POST);
    $datos["cat_id_categoria"]     = $cat_id_categoria;
    $datos["cat_nombre"]           = $cat_nombre;
    $datos["cat_descripcion"]      = $cat_descripcion;
    $r                             = categoria_modelo::mdlEditar($datos);
    if($r > 0){
        echo "Actualizacion exitosa!";
    }
}

public function eliminar(){
    $cod = $_GET["cod"];
    $r   = categoria_modelo::mdlEliminar($cod);
    if($r > 0){
        echo "Se ha eliminado el registro";
    } 

 
}

}

?>