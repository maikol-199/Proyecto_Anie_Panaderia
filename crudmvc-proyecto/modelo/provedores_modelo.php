<?php

class provedores_modelo{

    public static function mdlRegistrar($datos){
        $i = new Conexion();
        $c = $i->getConexion();
        $sql = "INSERT INTO provedores
                (Pro_Id_Provedor, Pro_Telefono, Pro_Correo, Pro_Razon_Social, Pro_Direccion)
                VALUES
                ( ? , ? , ? , ? , ? )";
        $s = $c->prepare($sql);
        $v = array( $datos["Pro_Id_Provedor"]  , 
                    $datos["Pro_Telefono"]     , 
                    $datos["Pro_Correo"]       , 
                    $datos["Pro_Razon_Social"] ,
                    $datos["Pro_Direccion"]    );
        return $s->execute($v);
        //return $r;
    }

    public static function mdlListado(){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM provedores";
        $s   = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public static function mdlEliminar($cod){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "DELETE FROM provedores WHERE Pro_Id_Provedor = ? ";
        $s   = $c->prepare($sql);
        $v   = array($cod);
        return $s->execute($v);
    }
    
    public static function mdlConsultarXcod($cod){
    $i   = new Conexion();
    $c   = $i->getConexion();
    $sql = "SELECT * FROM provedores where Pro_Id_Provedor = ? ";
    $s   = $c->prepare($sql);
    $v   = array($cod);
    $s->execute($v);
    return $s->fetch();
    }
    
    public static function mdlEditar($datos){
    $i = new Conexion();
    $c = $i->getConexion();
    $sql = "update provedores set Pro_Id_Provedor =   ? ,
                                   Pro_Telefono =      ? ,
                                   Pro_Correo =        ? ,
                                   Pro_Razon_Social =  ? ,
                                   Pro_Direccion =     ? 
                                   where Pro_Id_Provedor = ? ";
    $s = $c->prepare($sql);
    $v = array( $datos["Pro_Id_Provedor"]  , 
                $datos["Pro_Telefono"]     , 
                $datos["Pro_Correo"]       , 
                $datos["Pro_Razon_Social"] , 
                $datos["Pro_Direccion"]    , 
                $datos["Pro_Id_Provedor"]     
              );
    return $s->execute($v);
    }

    public static function mdlConsultar($codigo){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM provedores WHERE Pro_Id_Provedor LIKE '$codigo%'";
        $s   = $c->prepare($sql);
        $v   =array($codigo);
        $s->execute();
        return $s->fetchAll();
    }
}

?>