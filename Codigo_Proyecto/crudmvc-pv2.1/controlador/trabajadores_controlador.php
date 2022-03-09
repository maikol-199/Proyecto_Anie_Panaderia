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
        $r                          = trabajadores_modelo::mdlVerificar($Tra_Usu_Cedula);
        if($r > 0){
            $r                          = trabajadores_modelo::mdlRegistrar($datos);
            if($r > 0){
                echo json_encode(array("mensaje"=>"Registro Exitoso", "icono"=>"success"));
            }
        }else{
            echo json_encode(array("mensaje"=>"El Trabajador no Puede ser Registrado", "icono"=>"error", "alt"=>"Error"));
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
            echo json_encode(array("mensaje"=>" Exitoso", "icono"=>"success"));
        }
    }
    public function eliminar(){
        $cod = $_GET["cod"];
		$r   = trabajadores_modelo::mdlEliminar($cod);
		if($r > 0){
            echo json_encode(array("mensaje"=>" Registro Eliminado"));
            
        } else{
            echo json_encode(array("mensaje"=>" Error al Eliminar"));
        }
    }
    public function listar(){}
}

?>