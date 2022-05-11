<?php 
require_once "modelo/categoria_modelo.php";
class categoria_controlador{

        public function __construct(){
            $this->vista = new Contenido();
        }

    public function index(){
        $this->vista->datos= categoria_modelo::mdlListado();
        $this->vista->estructura("categoria/index",true);
    }

    public function frmRegistrar(){
        $this->vista->estructura("categoria/frmRegistrar",true);

    }

    public function registrar(){
        extract($_POST);
        $datos["cat_id_categoria"]     = $cat_id_categoria;
        $datos["cat_nombre"]           = $cat_nombre;
        $datos["cat_descripcion"]      = $cat_descripcion;
        $r                             = categoria_modelo::mdlRegistrar($datos);
        if($r > 0){
        // echo "Registro exitoso!";
        echo json_encode(array("mensaje"=>"Registro Exitoso", "icono"=>"success"));
        }

    }

    public function frmEditar(){
        $cod = $_GET["cod"];
        $this->vista->datos = categoria_modelo::mdlConsultarXcod($cod);
        $this->vista->estructura("categoria/frmEditar",true);
    }

    public function editar(){
        extract($_POST);
        $datos["cat_id_categoria"]     = $cat_id_categoria;
        $datos["cat_nombre"]           = $cat_nombre;
        $datos["cat_descripcion"]      = $cat_descripcion;
        $r                             = categoria_modelo::mdlEditar($datos);
        if($r > 0){
            //echo "Actualizacion exitosa!";
            echo json_encode(array("mensaje"=>" Exitoso", "icono"=>"success"));
        }
        
    }

    public function eliminar(){
        $cod = $_GET["cod"];
        $r   = categoria_modelo::mdlEliminar($cod);
        if($r > 0){
            echo json_encode(array("mensaje"=>" Registro Eliminado"));
            
        } else{
            echo json_encode(array("mensaje"=>" Error al Eliminar"));
        }

    
    }

   

    public function frmConsultar(){
        $this->vista->estructura("categoria/frmConsultar",true);
        
    }
    
    public function consultar(){
        $codigo = $_POST["codigo"];
        $r      = categoria_modelo::mdlConsultar($codigo);
        $tabla  = ' <table class="table align-items-center mb-0">
        <tr>
            <th>Id categoria</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th></th>
            <th></th>
        </tr>';
        foreach ($r as $valor){

            $cod = $valor["Cat_Id_Categoria"];
                        $tabla.= "<tr>";
                        $tabla.=  "<td>" . $valor["Cat_Id_Categoria"] . "</td>";
                        $tabla.=  "<td>" . $valor["Cat_Nombre"] . "</td>";
                        $tabla.=  "<td>" . $valor["Cat_Descripcion"] . "</td>";
                        $tabla.=  "<td>
                      <a href='?controlador=categoria&accion=frmEditar&cod=$cod'>Editar</a>
                      </td>";
                      $tabla.=  "<td>
                      <a href='?controlador=categoria&accion=eliminar&cod=$cod'class='eliminar'>Eliminar</a>
                      </td>";
                      $tabla.= "</tr>";
        }
        echo json_encode(array("tabla"=>$tabla));
    }

    public function reporteCategoria(){
        $datos= categoria_modelo::mdlListado();
        require_once "vista/admin/categoria/reporteCategoria.php";
    }

}

?>