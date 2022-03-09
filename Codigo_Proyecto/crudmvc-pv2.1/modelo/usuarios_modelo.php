<?php
class usuarios_modelo{

    public static function mdlRegistrar($datos){
        $i = new Conexion();
        $c = $i->getConexion();
        $sql = "INSERT INTO usuarios
                (usu_cedula, usu_nombre, usu_apellido, usu_telefono, usu_usuario, usu_contraseña, usu_fecha, usu_email, usu_rol)
                VALUES
                ( ? , ? , ? , ? , ? , ? , ? , ? , ? )";
        $s = $c->prepare($sql);
        $v = array( $datos["usu_cedula"]    , 
                    $datos["usu_nombre"]    , 
                    $datos["usu_apellido"]  , 
                    $datos["usu_telefono"]  , 
                    $datos["usu_usuario"]   , 
                    $datos["usu_contraseña"], 
                    $datos["usu_fecha"]     , 
                    $datos["usu_email"]     ,
                    $datos["usu_rol"]       );
        return $s->execute($v);
        //return $r;
    }

    public static function mdlListado(){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM usuarios";
        $s   = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public static function mdlEliminar($cod){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "DELETE FROM usuarios WHERE usu_cedula = ? ";
        $s   = $c->prepare($sql);
        $v   = array($cod);
        return $s->execute($v);
    }
    
public static function mdlConsultarXcod($cod){
    $i   = new Conexion();
    $c   = $i->getConexion();
    $sql = "SELECT * FROM usuarios where usu_cedula = ? ";
    $s   = $c->prepare($sql);
    $v   = array($cod);
    $s->execute($v);
    return $s->fetch();
}
public static function mdlEditar($datos){
    $i = new Conexion();
    $c = $i->getConexion();
    $sql = "update usuarios set usu_cedula =  ? ,
                                 usu_nombre =  ? ,
                                 usu_apellido =  ? ,
                                 usu_telefono =  ? ,
                                 usu_usuario = ? ,
                                 usu_fecha = ? ,
                                 usu_email = ? ,
                                 usu_rol = ?
                                 where usu_cedula = ? ";
    $s = $c->prepare($sql);
    $v = array( $datos["usu_cedula"]    , 
                $datos["usu_nombre"]    , 
                $datos["usu_apellido"]  , 
                $datos["usu_telefono"]  , 
                $datos["usu_usuario"]   , 
                $datos["usu_fecha"]     , 
                $datos["usu_email"]     ,
                $datos["usu_rol"]     ,
                $datos["usu_cedula"]     
             );
    return $s->execute($v);
}
}