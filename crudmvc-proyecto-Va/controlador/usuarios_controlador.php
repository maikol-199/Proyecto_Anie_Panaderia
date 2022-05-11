<?php 
require_once "modelo/usuarios_modelo.php";
class usuarios_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }

    public function index(){
        $this->vista->datos= usuarios_modelo::mdlListado();
        $this->vista->estructura("usuarios/index",true);
    }
    public function frmRegistrar(){
        $this->vista->estructura("usuarios/frmRegistrar",true);
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
        if(isset($_SESSION["nombre"])){
            $datos["usu_rol"]        = $usu_rol;
        }else{
            $datos["usu_rol"]        = "Cliente";
        }
        $r                       = usuarios_modelo::mdlRegistrar($datos);
         if($r > 0){
            if($r > 0){
                // echo "Registro exitoso!";
               // mail($usu_email, "hsfjkhvsjk", "sdcs $usu_contraseña");
                echo json_encode(array("mensaje"=>"Registro Exitoso", "icono"=>"success"));
            }
         }
        
        
    }
    public function frmEditar(){
        $cod = $_GET["cod"];
        $this->vista->datos = usuarios_modelo::mdlConsultarXcod($cod);
        $this->vista->estructura("usuarios/frmEditar",true);
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

    public function frmConsultar(){
        $this->vista->estructura("usuarios/frmConsultar",true);
        
    }

    public function consultar(){
        $codigo = $_POST["codigo"];
        $r      = usuarios_modelo::mdlConsultar($codigo);
        $tabla  = ' <table class="table align-items-center mb-0">
        <tr>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Usuario</th>
        <th>Fecha Registro</th>
        <th>Rol</th>
        <th></th>
        <th></th>
        </tr>';
        foreach ($r as $valor){

            $cod = $valor["Usu_Cedula"];
            $tabla.= "<tr>";
            $tabla.= "<td>".$valor["Usu_Cedula"]."</td>";
            $tabla.=  "<td>".$valor["Usu_Nombre"]."</td>";
            $tabla.=  "<td>".$valor["Usu_Apellido"]."</td>";
            $tabla.=  "<td>".$valor["Usu_Telefono"]."</td>";
            $tabla.=  "<td>".$valor["Usu_Usuario"]."</td>";
            $tabla.=  "<td>".$valor["Usu_Fecha"]."</td>";
                //echo  "<td>".$valor["Usu_Email"]."</td>";
                $tabla.=  "<td>".$valor["Usu_Rol"]."</td>";
                $tabla.=  "<td>
                    <a href='?controlador=usuarios&accion=frmEditar&cod=$cod'>Editar</a>
                    </td>";
                    $tabla.=  "<td>
                    <a href='?controlador=usuarios&accion=eliminar&cod=$cod'class='eliminar'>Eliminar</a>
                    </td>";
                    $tabla.= "</tr>";
        }
        echo json_encode(array("tabla"=>$tabla));
    }

    

    public function frmEditarContra(){
        $this->vista->estructura("usuarios/frmEditarContra",true);
    }

    public function editarContra(){
        extract($_POST);
        $r   = usuarios_modelo::mdlValidar($con_actual);
		if($r > 0){
            if($con_nueva == $con_confirmar){
                $r   = usuarios_modelo::mdlEditarCon($con_nueva);
                if($r > 0){
                    echo json_encode(array("mensaje"=>" Exitoso", "icono"=>"success"));
                }else{
                    echo json_encode(array("mensaje"=>" ooo", "icono"=>"error"));
                } 
            }else{
                echo json_encode(array("mensaje"=>" Error f", "icono"=>"error"));
            }
            
        } else{
            echo json_encode(array("mensaje"=>" No coinside", "icono"=>"error"));
        }
    }

    public function listar(){}
}
