<?php

class Conexion{

    public function __construct(){
        try{
            $this->conexion = new PDO('mysql:host=localhost;dbname=bd-anie-pasteleria',"root","");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error al conectar:".$e->getMessage();
        }
    }

    public function getConexion(){
        if($this->conexion instanceof PDO){
            return $this->conexion;
        }   
    }
}