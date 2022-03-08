<?php
require_once "modelo/trabajadores_modelo.php";
class trabajadores_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }
    public function index(){
        $this->vista->datos= trabajadores_modelo::mdlListado();
        $this->vista->estructura("trabajadores/index");
    }
    public function frmRegistrar(){
        $this->vista->estructura("trabajadores/formRegistrar");
    }
    public function registrar(){
        extract($_POST);
        $datos["Tra_Usu_Cedula"]    = $Tra_Usu_Cedula;
        $datos["Tra_Area"]          = $Tra_Area;
        $datos["Tra_Cargo"]         = $Tra_Cargo;
        $datos["Tra_Sexo"]          = $Tra_Sexo;
        $datos["Tra_Salario"]       = $Tra_Salario;
        $r                          = trabajadores_modelo::mdlRegistrar($datos);
        if($r > 0){
            echo "Registro exitoso!";
        }
    }
    public function frmEditar(){
        $cod = $_GET["cod"];
        $this->vista->datos = trabajadores_modelo::mdlConsultarXcod($cod);
        $this->vista->estructura("trabajadores/formEditar");
    }
    public function editar(){
        extract($_POST);
        $datos["tra_usu_cedula"]    = $tra_usu_cedula;
        $datos["tra_area"]          = $tra_area;
        $datos["tra_cargo"]         = $tra_cargo;
        $datos["tra_sexo"]          = $tra_sexo;
        $datos["tra_salario"]       = $tra_salario;
        $r                          = trabajadores_modelo::mdlEditar($datos);
        if($r > 0){
            echo "Datos Actualizados!";
        }
    }
    public function eliminar(){
        $cod = $_GET["cod"];
		$r   = trabajadores_modelo::mdlEliminar($cod);
		if($r > 0){
			echo "Se ha eliminado el registro";
		} 
    }
    public function listar(){}
}

?>