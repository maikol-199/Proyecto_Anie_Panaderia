<?php 
require_once "modelo/pago_modelo.php";
class pago_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }

    public function index(){
            $this->vista->datos= pago_modelo::mdlListado();
            $this->vista->estructura("pago/index",true);
    }

    public function frmRegistrar(){
        $this->vista->estructura("pago/frmRegistrar",true);
    }

    public function registrar(){
        extract($_POST);
        $datos["pag_id_pago"]      = $pag_id_pago;
        $datos["pag_forma_pago"]   = $pag_forma_pago;
        $datos["pag_valor"]        = $pag_valor;
        $datos["pag_comprobante"]  = $pag_comprobante;
        $r                         = pago_modelo::mdlRegistrar($datos);
        if($r > 0){
            // echo "Registro exitoso!";
            echo json_encode(array("mensaje"=>"Registro Exitoso", "icono"=>"success"));
        }
    }

    public function frmEditar(){
        $cod = $_GET["cod"];
        $this->vista->datos = pago_modelo::mdlConsultarXcod($cod);
        $this->vista->estructura("pago/frmEditar",true);
    }
    public function editar(){
        extract($_POST);
        $datos["pag_id_pago"]      = $pag_id_pago;
        $datos["pag_forma_pago"]   = $pag_forma_pago;
        $datos["pag_valor"]        = $pag_valor;
        $datos["pag_comprobante"]  = $pag_comprobante;
        $r                       = pago_modelo::mdlEditar($datos);
        if($r > 0){
            //echo "Datos Actualizados!";
            echo json_encode(array("mensaje"=>" Exitoso", "icono"=>"success"));
        }
    }
    public function eliminar(){
        $cod = $_GET["cod"];
		$r   = pago_modelo::mdlEliminar($cod);
		if($r > 0){
            echo json_encode(array("mensaje"=>" Registro Eliminado"));
            
        } else{
            echo json_encode(array("mensaje"=>" Error al Eliminar"));
        }
    }

    public function frmConsultar(){
        $this->vista->estructura("pago/frmConsultar",true);
        
    }

    public function consultar(){
        $codigo = $_POST["codigo"];
        $r      = pago_modelo::mdlConsultar($codigo);
        $tabla  = ' <table class="table align-items-center mb-0">
        <tr>
            <th>Id Pago</th>
            <th>Forma de Pago</th>
            <th>Valor</th>
            <th>Comprobante</th>
            <th></th>
            <th></th>
        </tr>';
        foreach ($r as $valor){

            $cod = $valor["Pag_Id_Pago"];
                        $tabla.= "<tr>";
                        $tabla.=  "<td>" . $valor["Pag_Id_Pago"] . "</td>";
                        $tabla.=  "<td>" . $valor["Pag_Forma_Pago"] . "</td>";
                        $tabla.=  "<td>" . $valor["Pag_Valor"] . "</td>";
                        $tabla.=  "<td>" . $valor["Pag_Comprobante"] . "</td>";
                        $tabla.=  "<td>
                      <a href='?controlador=pago&accion=frmEditar&cod=$cod'>Editar</a>
                      </td>";
                      $tabla.=  "<td>
                      <a href='?controlador=pago&accion=eliminar&cod=$cod'class='eliminar'>Eliminar</a>
                      </td>";
                      $tabla.= "</tr>";
        }
        echo json_encode(array("tabla"=>$tabla));
    }

}




?>