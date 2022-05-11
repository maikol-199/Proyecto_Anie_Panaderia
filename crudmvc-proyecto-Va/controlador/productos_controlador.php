<?php
require_once "modelo/productos_modelo.php";
require_once "modelo/categoria_modelo.php";
class productos_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }
    public function index(){
        $this->vista->datos= productos_modelo::mdlListado();
        $this->vista->estructura("productos/index",true);
    }
    public function frmRegistrar(){
        $this->vista->cat = categoria_modelo::mdlListado();
        $this->vista->estructura("productos/frmRegistrar",true);
    }

    
   

    public function registrar(){
        extract($_POST);
        $foto_producto = $_FILES["Pro_Foto_Producto"]["name"];
        $archivo_tmp = $_FILES["Pro_Foto_Producto"]["tmp_name"];
        $fecha = date("Ymd_His");
        $foto_producto = $fecha.".".$foto_producto;

        $datos["pro_id_producto"]       = $pro_id_producto;
        $datos["pro_nombre"]            = $pro_nombre;
        $datos["pro_precio"]            = $pro_precio;
        $datos["pro_cat_id_categoria"]  = $pro_cat_id_categoria;
        $datos["pro_detalle"]           = $pro_detalle;
        $datos["pro_descripcion"]       = $pro_descripcion;
        $datos["pro_estado"]            = $pro_estado;
        $datos["pro_foto_producto"]     = $foto_producto; 
        if(move_uploaded_file($archivo_tmp, "public/assets/img/fotos_productos/$foto_producto")) {
            $r                          = productos_modelo::mdlRegistrar($datos);
            if($r > 0){
                echo json_encode(
                    array("mensaje"=>"Registro Exitoso", "icono"=>"success")
                );
            }
        }
    }

    public function frmEditar(){
        $cod = $_GET["cod"];
        $this->vista->cat = categoria_modelo::mdlListado();
        $this->vista->datos = productos_modelo::mdlConsultarXcod($cod);
        $this->vista->estructura("productos/frmEditar",true);
    }
    public function editar(){
        extract($_POST);
        $datos["pro_id_producto"]     = $pro_id_producto;
        $datos["pro_nombre"]          = $pro_nombre;
        $datos["pro_precio"]          = $pro_precio;
        $datos["pro_cat_id_categoria"]   = $pro_cat_id_categoria;
        $datos["pro_detalle"]    = $pro_detalle;
        $datos["pro_descripcion"] = $pro_descripcion;
        $datos["pro_estado"]      = $pro_estado;
        $r                       = productos_modelo::mdlEditar($datos);
        if($r > 0){
            //echo "Datos Actualizados!";
            echo json_encode(array("mensaje"=>" Exitoso", "icono"=>"success"));
        }
    }

    public function eliminar(){
        $cod = $_GET["cod"];
		$r   = productos_modelo::mdlEliminar($cod);
		if($r > 0){
            echo json_encode(array("mensaje"=>" Registro Eliminado"));
            
        } else{
            echo json_encode(array("mensaje"=>" Error al Eliminar"));
        }
    }

    public function frmConsultar(){
        $this->vista->estructura("productos/frmConsultar",true);
    }

    public function consultar(){
        $codigo = $_POST["codigo"];
        $r      = productos_modelo::mdlConsultar($codigo);
        $tabla  = ' <table class="table align-items-center mb-0">
        <tr>
        <th>Id Producto</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Categoria</th>
        <th>Detalle</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th></th>
        <th></th>
        </tr>';
        foreach ($r as $valor){

            $cod = $valor["Pro_Id_Producto"];
            $tabla.= "<tr>";
            $tabla.=  "<td>".$valor["Pro_Id_Producto"]."</td>";
            $tabla.=  "<td>".$valor["Pro_Nombre"]."</td>";
            $tabla.=  "<td>".$valor["Pro_Precio"]."</td>";
            $tabla.=  "<td>".$valor["Pro_Cat_Id_Categoria"]."</td>";
            $tabla.=  "<td>".$valor["Pro_Detalle"]."</td>";
            $tabla.=  "<td>".$valor["Pro_Descripcion"]."</td>";
            $tabla.= "<td>".$valor["Pro_Estado"]."</td>";
            $tabla.=  "<td>
                            <a href='?controlador=productos&accion=frmEditar&cod=$cod'>Editar</a>
                            </td>";
                            $tabla.=  "<td>
                            <a href='?controlador=productos&accion=eliminar&cod=$cod'class='eliminar'>Eliminar</a>
                            </td>";
                            $tabla.= "</tr>";
        }
        echo json_encode(array("tabla"=>$tabla));
    }

}

?>