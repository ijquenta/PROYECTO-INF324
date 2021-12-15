<?php

function buscaProcesoC($idproccondi){
    $proc = simplexml_load_file("C:\\xampp\\htdocs\\proyecto\\xmls\\procesoscondi.xml");
    $res=-1;
    foreach($proc as $p){
        if($idproccondi == $p->ID){
            $res = $p;
            break;
        }
    }
    return $res;
}

?>
