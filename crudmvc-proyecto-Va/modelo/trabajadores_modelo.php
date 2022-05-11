<?php

class trabajadores_modelo{

    public static function mdlRegistrar($datos){
        $i = new Conexion();
        $c = $i->getConexion();
        $sql = "INSERT INTO trabajadores
                (Tra_Usu_Cedula, Tra_Area, Tra_Cargo, Tra_Sexo, Tra_Salario)
                VALUES
                ( ? , ? , ? , ? , ? )";
        $s = $c->prepare($sql);
        $v = array( $datos["Tra_Usu_Cedula"], 
                    $datos["Tra_Area"], 
                    $datos["Tra_Cargo"], 
                    $datos["Tra_Sexo"],
                    $datos["Tra_Salario"]);
        return $s->execute($v);
        //return $r;
    }

    public static function mdlListado(){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM trabajadores";
        $s   = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public static function mdlEliminar($cod){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "DELETE FROM trabajadores WHERE Tra_Usu_Cedula = ? ";
        $s   = $c->prepare($sql);
        $v   = array($cod);
        return $s->execute($v);
    }

    public static function mdlVerificar($cod){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM usuarios WHERE usu_cedula = ? ";
        $s   = $c->prepare($sql);
        $v   = array($cod);
        $s->execute($v);
        return $s->rowCount();
    }
    
    public static function mdlConsultarXcod($cod){
    $i   = new Conexion();
    $c   = $i->getConexion();
    $sql = "SELECT * FROM trabajadores where tra_usu_cedula = ? ";
    $s   = $c->prepare($sql);
    $v   = array($cod);
    $s->execute($v);
    return $s->fetch();
    }
    
    public static function mdlEditar($datos){
    $i = new Conexion();
    $c = $i->getConexion();
    $sql = "update trabajadores set tra_usu_cedula      = ? ,
                                   tra_area             = ? ,
                                   tra_cargo            = ? ,
                                   tra_sexo             = ? ,
                                   tra_salario          = ? 
                                   where tra_usu_cedula = ? ";
    $s = $c->prepare($sql);
    $v = array( $datos["tra_usu_cedula"], 
                $datos["tra_area"]       , 
                $datos["tra_cargo"]      , 
                $datos["tra_sexo"]      , 
                $datos["tra_salario"]    , 
                $datos["tra_usu_cedula"]     
              );
    return $s->execute($v);
    }

    public static function mdlConsultar($codigo){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM trabajadores WHERE Tra_Usu_Cedula LIKE '$codigo%'";
        $s   = $c->prepare($sql);
        $v   =array($codigo);
        $s->execute();
        return $s->fetchAll();
    }
}

?>