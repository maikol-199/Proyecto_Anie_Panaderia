<?php
require_once "modelo/productos_modelo.php";
class productos_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }
    public function index(){
        $this->vista->datos= productos_modelo::mdlListado();
        $this->vista->estructura("productos/index");
    }
    public function frmRegistrar(){
        $this->vista->estructura("productos/frmRegistrar");
    }
    public function registrar(){
        extract($_POST);
        $datos["pro_id_producto"]     = $pro_id_producto;
        $datos["pro_nombre"]          = $pro_nombre;
        $datos["pro_precio"]          = $pro_precio;
        $datos["pro_cat_id_categoria"]   = $pro_cat_id_categoria;
        $datos["pro_detalle"]    = $pro_detalle;
        $datos["pro_descripcion"] = $pro_descripcion;
        $datos["pro_estado"]      = $pro_estado;
        $r                       = productos_modelo::mdlRegistrar($datos);
        if($r > 0){
            echo "Registro exitoso!";
        }
    }
    public function frmEditar(){
        $cod = $_GET["cod"];
        $this->vista->datos = productos_modelo::mdlConsultarXcod($cod);
        $this->vista->estructura("productos/frmEditar");
    }
    public function editar(){
        extract($_POST);
        $datos["pro_id_producto"]     = $pro_id_producto;
        $datos["pro_nombre"]          = $pro_nombre;
        $datos["pro_precio"]          = $pro_precio;
        $datos["pro_cat_id_categoria"]   = $pro_cat_id_categoria;
        $datos["pro_detalle"]    = $pro_detalle;
        $datos["pro_descripcion"] = $pro_descripcion;
        $datos["pro_estado"]      = $pro_estado;
        $r                       = productos_modelo::mdlEditar($datos);
        if($r > 0){
            echo "Datos Actualizados!";
        }
    }

    public function eliminar(){
        $cod = $_GET["cod"];
		$r   = productos_modelo::mdlEliminar($cod);
		if($r > 0){
			echo "Se ha eliminado el registro";
		} 
    }

}

?>