<?php
session_start();
include "xmlusuario.inc.php";
$id = $_POST['idusuario'];
$pass = $_POST['pass'];
$respuesta = esUsuario($id, $pass);
if($respuesta == -1){
    header('Location: login.php');
}else{
    include "xmltramite.inc.php";
    $_SESSION['id'] = $id;
    $rol = $respuesta->PLANTEL;
    $rol = strval($rol);
    $_SESSION['rol']=$rol;
    $nrotramite = tramiteUsuario($id);
    if($nrotramite == -1){
        //obtenemos nuevo tramite
        $nrotramite = nuevoTramite();
        $_SESSION['nrotramite']=$nrotramite;
        escribirTramite($nrotramite, $id);
        header('Location: procesos.php?proceso=P1');
    }else{
        $_SESSION['nrotramite']=$nrotramite;
        header("Location: bandeja.php");
    }

}
?>