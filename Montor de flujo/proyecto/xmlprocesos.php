<?php
function leer(){
    $procesos = simplexml_load_file("C:\\xampp\\htdocs\\proyecto\\xmls\\procesos.xml");
    foreach($procesos as $proceso){
        echo "<br>ID: ". $proceso->ID . "<br>Descripción: ".$proceso->DESCRIPCION."<br>Proceso Siguiente: ".$proceso->SIGUIENTE."<br>Flujo: ".$proceso->FLUJO."<br>TIPO: ".$proceso->TIPO."<br>Formulario: ".$proceso->FORMULARIO;
    }
}
function buscaProceso($idproc){
    $procesos = simplexml_load_file("C:\\xampp\\htdocs\\proyecto\\xmls\\procesos.xml");
    $respuesta=-1;
    foreach($procesos as $proceso){
        if($idproc == $proceso->ID){
            $respuesta = $proceso;
            break;
        }
    }
    return $respuesta;
}
/*leer();
$res = buscaProceso("P5");
if($res==-1){
    echo "No se encontro un proceso";
}else{
    echo "TIPO: ".$res->TIPO;
}*/

?>