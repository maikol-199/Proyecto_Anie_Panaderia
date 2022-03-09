<?php 
require_once "modelo/usuarios_modelo.php";
class usuarios_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }

    public function index(){
        $this->vista->datos= usuarios_modelo::mdlListado();
        $this->vista->estructura("usuarios/index");
    }
    public function frmRegistrar(){
        $this->vista->estructura("usuarios/frmRegistrar");
    }
    public function registrar(){
        extract($_POST);
        $datos["usu_cedula"]     = $usu_cedula;
        $datos["usu_nombre"]     = $usu_nombre;
        $datos["usu_apellido"]   = $usu_apellido;
        $datos["usu_telefono"]   = $usu_telefono;
        $datos["usu_usuario"]    = $usu_usuario;
        $datos["usu_contraseña"] = $usu_contraseña;
        $datos["usu_fecha"]      = $usu_fecha;
        $datos["usu_email"]      = $usu_email;
        $datos["usu_rol"]        = $usu_rol;
        $r                       = usuarios_modelo::mdlRegistrar($datos);
         if($r > 0){
            if($r > 0){
                // echo "Registro exitoso!";
                echo json_encode(array("mensaje"=>"Registro Exitoso", "icono"=>"success"));
            }
         }
        
        
    }
    public function frmEditar(){
        $cod = $_GET["cod"];
        $this->vista->datos = usuarios_modelo::mdlConsultarXcod($cod);
        $this->vista->estructura("usuarios/frmEditar");
    }
    public function editar(){
        extract($_POST);
        $datos["usu_cedula"]     = $usu_cedula;
        $datos["usu_nombre"]     = $usu_nombre;
        $datos["usu_apellido"]   = $usu_apellido;
        $datos["usu_telefono"]   = $usu_telefono;
        $datos["usu_usuario"]    = $usu_usuario;
        $datos["usu_fecha"]      = $usu_fecha;
        $datos["usu_email"]      = $usu_email;
        $datos["usu_rol"]        = $usu_rol;
        $r                       = usuarios_modelo::mdlEditar($datos);
        if($r > 0){
            //echo "Datos Actualizados!";
            echo json_encode(array("mensaje"=>" Exitoso", "icono"=>"success"));
        }
    }
    public function eliminar(){
        $cod = $_GET["cod"];
		$r   = usuarios_modelo::mdlEliminar($cod);
		if($r > 0){
            echo json_encode(array("mensaje"=>" Registro Eliminado"));
            
        } else{
            echo json_encode(array("mensaje"=>" Error al Eliminar"));
        }
    }
    public function listar(){}
}
