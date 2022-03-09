<?php 
class categoria_modelo{

    public static function mdlListado(){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM categoria_producto";
        $s   = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }    

public static function mdlRegistrar($datos){
    
    $i = new Conexion();
    $c = $i->getConexion();
    $sql = "INSERT INTO categoria_producto
            (Cat_Id_Categoria, Cat_Nombre, Cat_Descripcion)
            VALUES
            ( ? , ? , ? )";
    $s = $c->prepare($sql);
    $v = array( $datos["cat_id_categoria"]    , 
                $datos["cat_nombre"]          , 
                $datos["cat_descripcion"]     );
    return $s->execute($v);
}

public static function mdlConsultarXcod($cod){
    $i   = new Conexion();
    $c   = $i->getConexion();
    $sql = "SELECT * FROM categoria_producto where cat_id_categoria = ? ";
    $s   = $c->prepare($sql);
    $v   = array($cod);
    $s->execute($v);
    return $s->fetch();
}

public static function mdlEditar($datos){
    $i = new Conexion();
    $c = $i->getConexion();
    $sql = "update categoria_producto set cat_id_categoria      = ? ,
                                                cat_nombre      = ? ,
                                                cat_descripcion = ?
                                 where cat_id_categoria = ? ";
    $s = $c->prepare($sql);
    $v = array( $datos["cat_id_categoria"]    , 
                $datos["cat_nombre"]          , 
                $datos["cat_descripcion"]     ,
                $datos["cat_id_categoria"]   
             );
    return $s->execute($v);
    
}

public static function mdlEliminar($cod){
    $i   = new Conexion();
    $c   = $i->getConexion();
    $sql = "DELETE FROM categoria_producto WHERE cat_id_categoria = ? ";
    $s   = $c->prepare($sql);
    $v   = array($cod);
    return $s->execute($v);
}

    public static function mdlConsultar($codigo){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM categoria_producto WHERE cat_id_categoria LIKE '$codigo%'";
        $s   = $c->prepare($sql);
        $v   =array($codigo);
        $s->execute();
        return $s->fetchAll();
    }

}
?>