<?php 
class productos_modelo{

    public static function mdlRegistrar($datos){
        $i = new Conexion();
        $c = $i->getConexion();
        $sql = "INSERT INTO productos
                (pro_id_producto, pro_nombre, pro_precio, pro_cat_id_categoria, pro_detalle, pro_descripcion, pro_estado, pro_foto_producto)
                VALUES
                ( ? , ? , ? , ? , ? , ? , ? , ?)";
        $s = $c->prepare($sql);
        $v = array( $datos["pro_id_producto"]    , 
                    $datos["pro_nombre"]    , 
                    $datos["pro_precio"]  , 
                    $datos["pro_cat_id_categoria"]  , 
                    $datos["pro_detalle"]   , 
                    $datos["pro_descripcion"], 
                    $datos["pro_estado"] ,
                    $datos["pro_foto_producto"]   
                );
        return $s->execute($v);
    }

    public static function mdlListado(){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM productos";
        $s   = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }   
    
    public static function mdlEliminar($cod){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "DELETE FROM productos WHERE pro_id_producto = ? ";
        $s   = $c->prepare($sql);
        $v   = array($cod);
        return $s->execute($v);
    }
    public static function mdlConsultarXcod($cod){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM productos where pro_id_producto = ?";
        $s   = $c->prepare($sql);
        $v   = array($cod);
        $s->execute($v);
        return $s->fetch();
    }
    public static function mdlConsultar($codigo){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM productos WHERE pro_id_producto LIKE '$codigo%'";
        $s   = $c->prepare($sql);
        $v   =array($codigo);
        $s->execute();
        return $s->fetchAll();
    }

   


    public static function mdlEditar($datos){
        $i = new Conexion();
        $c = $i->getConexion();
        $sql = "update productos set pro_id_producto =  ? ,
                                     pro_nombre =  ? ,
                                     pro_precio =  ? ,
                                     pro_cat_id_categoria =  ? ,
                                     pro_detalle = ? ,
                                     pro_descripcion = ? ,
                                     pro_estado = ? 
                                     where pro_id_producto = ? ";
        $s = $c->prepare($sql);
        $v = array( $datos["pro_id_producto"]    , 
                    $datos["pro_nombre"]    , 
                    $datos["pro_precio"]  , 
                    $datos["pro_cat_id_categoria"]  , 
                    $datos["pro_detalle"]   , 
                    $datos["pro_descripcion"]     , 
                    $datos["pro_estado"]     ,
                    $datos["pro_id_producto"]       
                 );
        return $s->execute($v);
    }
}

?>