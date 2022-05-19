<?php
require_once "modelo/inicio_modelo.php";
require_once "modelo/productos_modelo.php";
require_once "modelo/categoria_modelo.php";
class inicio_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }
    
    public function index(){
        if (!isset($_SESSION["nombre"])) {
            
            $this->vista->con = true;
            $this->vista->datos= productos_modelo::mdlListado();
            $this->vista->estructura("inicio/index");
        }else{
            if($_SESSION["rol"]=="Cliente"){
                $this->vista->datos= productos_modelo::mdlListado();
                $this->vista->con = true;
                $this->vista->estructura("inicio/index");
            }else{
                $this->vista->datos= productos_modelo::mdlListado();
                $this->vista->estructura("inicio/principal",true);
            }
        }
    }


    public function frmLogin(){
        require_once "vista/admin/inicio/frmlogin.php";
    }

    public function frmListarProUsu(){
        $this->vista->datos= productos_modelo::mdlListado();
        $this->vista->con = false;
        $this->vista->estructura("inicio/ListarProductosUsu");
        // require_once "vista/inicio/ListarProductosUsu.php";
    }

    public function CarritoCompra(){
        
        $this->vista->con = false;
        $this->vista->estructura("inicio/CarritoCompra");
    }

  
    public function frmRegUsu(){
        require_once "vista/inicio/frmRegUsu.php";
    }

    public function RegistroPedido(){
        
        $this->vista->con = false;
        if(isset($_SESSION["rol"])){
            require_once "vista/inicio/RegistroPedido.php";
        }else{
            header("location: ?controlador=inicio&accion=frmLogin");  
        }
        

    }

    public function validar(){
        extract($_POST);
        $r = inicio_modelo::mdlValidar($usuario, $contrasena);

    
        if(is_array($r)){

                $_SESSION["nombre"]    = $r["Usu_Nombre"];
                $_SESSION["apellido"]  = $r["Usu_Apellido"];
                $_SESSION["rol"]       = $r["Usu_Rol"];
                $_SESSION["cedula"]    = $r["Usu_Cedula"];

            echo json_encode(array("mensaje"=>" Esta encontrado", "icono"=>"success"));
            
        } else{
            echo json_encode(array("mensaje"=>" Usuario/contraseña incorrectos", "icono"=>"error"));
        }
    }

    public function cerrar(){
        session_destroy();
        header("location: ?controlador=inicio&accion=index");
    }

}

?>