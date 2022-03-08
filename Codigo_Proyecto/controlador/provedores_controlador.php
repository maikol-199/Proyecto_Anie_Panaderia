<?php
require_once "modelo/provedores_modelo.php";
class provedores_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }
    public function index(){
        $this->vista->datos= provedores_modelo::mdlListado();
        $this->vista->estructura("provedores/index");
    }
    public function frmRegistrar(){
        $this->vista->estructura("provedores/formRegistrar");
    }
    public function registrar(){
        extract($_POST);
        $datos["Pro_Id_Provedor"]    = $Pro_Id_Provedor;
        $datos["Pro_Telefono"]       = $Pro_Telefono;
        $datos["Pro_Correo"]         = $Pro_Correo;
        $datos["Pro_Razon_Social"]   = $Pro_Razon_Social;
        $datos["Pro_Direccion"]      = $Pro_Direccion;
        $r                           = provedores_modelo::mdlRegistrar($datos);
        if($r > 0){
           echo json_encode(array("mensaje"=>"Registro exitoso")
           
        )   ;
        }
    }
    public function frmEditar(){
        $cod = $_GET["cod"];
        $this->vista->datos = provedores_modelo::mdlConsultarXcod($cod);
        $this->vista->estructura("provedores/formEditar");
    }
    public function editar(){
        extract($_POST);
        $datos["Pro_Id_Provedor"]    = $pro_id_provedor;
        $datos["Pro_Telefono"]       = $pro_telefono;
        $datos["Pro_Correo"]         = $pro_correo;
        $datos["Pro_Razon_Social"]   = $pro_razon_social;
        $datos["Pro_Direccion"]      = $pro_direccion;
        $r                           = provedores_modelo::mdlEditar($datos);
        if($r > 0){
           echo json_encode(array("mensaje"=>"Se actualizo"));
        }
    }
    public function eliminar(){
        $cod = $_GET["cod"];
		$r   = provedores_modelo::mdlEliminar($cod);
		if($r > 0){
            echo json_encode(array("mensaje"=>"Se eliminoo"));
		} 
    }
    public function consultar(){
        $this->vista->estructura("provedores/formConsultar");
    }

}

?>