<?php
require_once "modelo/inicio_modelo.php";
class inicio_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }
    
    public function index(){
        $this->vista->titulo = " ---Anime";
        if (!isset($_SESSION["nombre"])) {
           header("location: ?controlador=inicio&accion=frmlogin");
        }
        $this->vista->estructura("inicio/principal");
    }

    public function frmLogin(){
       // $this->vista->estructura("inicio/frmlogin");
        require_once "vista/inicio/frmlogin.php";
    }

    public function validar(){
        extract($_POST);
        $r = inicio_modelo::mdlValidar($usuario, $contrasena);

        $_SESSION["nombre"]    = $r["Usu_Nombre"];
        $_SESSION["apellido"]  = $r["Usu_Apellido"];
        $_SESSION["rol"]       = $r["Usu_Rol"];
        if(is_array($r)){
            echo json_encode(array("mensaje"=>" Esta encontrado", "icono"=>"success"));
            
        } else{
            echo json_encode(array("mensaje"=>" Usuario/contraseña incorrectos", "icono"=>"error"));
        }
    }

}

?>