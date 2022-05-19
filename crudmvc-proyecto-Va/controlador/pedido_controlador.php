<?php 
require_once "modelo/pedido_modelo.php";
require_once "modelo/productos_modelo.php";
class pedido_controlador{


    public function __construct(){
        $this->vista = new Contenido();
    }

    public function index(){
            $this->vista->datos= pedido_modelo::mdlListado();
            $this->vista->estructura("pedido/index",true);
    }

    public function listarPedidos(){
        if(isset($_SESSION["nombre"])){
        
            $codu        = $_SESSION["cedula"] ;
        }else{
            header("location: ?controlador=inicio&accion=frmLogin");
        }
        $this->vista->datos= pedido_modelo::mdlListadoxCod($codu);
        $this->vista->con = false;
        $this->vista->estructura("inicio/ListarPedidos");

    }

    public function frmRegistrar(){
        $this->vista->estructura("pedido/frmRegistrar",true);
    }

   
    public function registrar(){
        extract($_POST);
        $datos["ped_fecha_pedido"]     = $ped_fecha_pedido;
        $datos["ped_fecha_entrega"]    = $ped_fecha_entrega;
        $datos["ped_direccion"]        = $ped_direccion;
        if(isset($_SESSION["nombre"])){
        
            $datos["ped_usu_cedula"]        = $_SESSION["cedula"] ;
            $datos["ped_estado"]        = "En Espera";
        }



        $idPedido                             = pedido_modelo::mdlRegistrar($datos);
        $idPro      =  json_decode($_POST["id"]);
        $cantidad =  json_decode($_POST["cantidad"]);
        // var_dump( $idPro);var_dump( $cantidad);exit;

        for($i = 0; $i< count($idPro); $i++){
           $r =  pedido_modelo::mdlRegistrarDetalle($idPedido, $idPro[$i], $cantidad[$i]);
        }
        

        if($r > 0){
            // echo "Registro exitoso!";
            echo json_encode(array("mensaje"=>"Registro Exitoso", "icono"=>"success"));
        }
    }

    public function frmEditar(){
        $cod = $_GET["cod"];
        $this->vista->datos = pedido_modelo::mdlConsultarXcod($cod);
        $this->vista->estructura("pedido/frmEditar",true);
    }

    public function eliminar(){
        $cod = $_GET["cod"];
        $r   = pedido_modelo::mdlEliminar($cod);
        if($r > 0){
            echo json_encode(array("mensaje"=>" Registro Eliminado"));
            
        } else{
            echo json_encode(array("mensaje"=>" Error al Eliminar"));
        }

    
    }

    
    public function editar(){
        extract($_POST);
        $datos["ped_id_pedido"]     = $ped_id_pedido;
        $datos["ped_fecha_pedido"]     = $ped_fecha_pedido;
        $datos["ped_fecha_entrega"]    = $ped_fecha_entrega;
        $datos["ped_direccion"]        = $ped_direccion;
        $datos["ped_estado"]        = $ped_estado;
        $r                       = pedido_modelo::mdlEditar($datos);
        if($r > 0){
            //echo "Datos Actualizados!";
            echo json_encode(array("mensaje"=>" Exitoso", "icono"=>"success"));
        }
    }

    public function detalle(){
        $cod = $_GET["cod"];
        $a = pedido_modelo::mdlconsultadetalle($cod);
        $id = $a["Ped_Pro_Id_Producto"];
        //$can =$a["Ped_Pro_Cantidad"];
        $this->vista->datos= pedido_modelo::mdlconsultadetalleprodu($id);
        $this->vista->estructura("pedido/frmdetalle",true);
    }

    public function detallecliente(){
        $cod = $_GET["cod"];
        $a = pedido_modelo::mdlconsultadetalle($cod);
        $id = $a["Ped_Pro_Id_Producto"];
        $this->vista->con = false;
        $this->vista->datos= pedido_modelo::mdlconsultadetalleprodu($id);
        $this->vista->estructura("inicio/frmdetallecliente");

    }
}



?>