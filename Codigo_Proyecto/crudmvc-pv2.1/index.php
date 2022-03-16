<?php
session_start();
require_once "libs/rutas.php";
require_once "libs/contenido.php";
require_once "libs/conexion.php";   
if(isset($_GET["controlador"]) && isset($_GET["accion"])){
    $controlador = $_GET["controlador"];
    $accion      = $_GET["accion"];
}else{
    $controlador = "inicio";
    $accion      = "index";
}

Rutas ::cargarContenido($controlador, $accion);