<?php
session_start();
$proceso = $_GET['proceso'];
include "xmlprocesos.php";
//buscamos el proceso y sacamos el proceso siguiente
$resultado = buscaProceso($proceso);
$procSig = strval($resultado->SIGUIENTE);
$tipo = strval($resultado->TIPO);
if($procSig != "0"){
    //significa que hay un proceso siguiente
    echo 'Location: procesos.php?proceso='.$procSig;
}else{
    //es un proceso condicionante
    if($tipo == 'C'){
        include "xmlprocesoscondi.php";
        $resultado2=buscaProcesoC($proceso);
        if($pregunta == 'Si'){
            $procSig = strval($resultado2->Si);
        }
        else{
            if($pregunta == 'No'){
                $procSig = strval($resultado2->Si);
            }
            else{
                echo 'Location: procesos.php?proceso='.$procSig;
            }
        }

    }
    echo 'Location: procesos.php?proceso='.$procSig;

}

?>