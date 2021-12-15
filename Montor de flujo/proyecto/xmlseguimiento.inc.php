<?php
function buscaTramiteSegui($nrotramite){
    $vect = array();
    $seguimientos = simplexml_load_file("C:\\xampp\\htdocs\\proyecto\\xmls\\seguimiento.xml");    
    foreach($seguimientos as $seguimiento){
        if($seguimiento->ID == $nrotramite){
            array_push($vect, $seguimiento);
        }
    }
    return $vect;
}
function nuevoSeguimiento($nrotramite, $ci, $proceso, $rol){
    $doc = new DOMDocument('1.0');
    $doc->formatOutput=true;
    $doc->load("C:\\xampp\\htdocs\\proyecto\\xmls\\seguimiento.xml");
    $raiz = $doc->getElementsByTagName("SEGUIMIENTOS")->item(0);
    //creamos una instancia(nuevo usuario) RAMA
    $seguimiento = $doc->createElement('SEGUIMIENTO');
    $seguimiento = $raiz->appendChild($seguimiento);
    //Definimos hoja (atributo)
    $hoja = $doc->createElement('ID');
    $hoja = $seguimiento->appendChild($hoja);
    //Añadimos el valor texto
    $hoja->appendChild($doc->createTextNode($nrotramite));
    //Definimos hoja (atributo)
    $hoja = $doc->createElement('CI');
    $hoja = $seguimiento->appendChild($hoja);
    //Añadimos el valor texto
    $hoja->appendChild($doc->createTextNode($ci));
    //Definimos hoja (atributo)
    $hoja = $doc->createElement('PROCESO');
    $hoja = $seguimiento->appendChild($hoja);
    //Añadimos el valor texto
    $hoja->appendChild($doc->createTextNode($proceso));
    //Definimos hoja (atributo)
    $hoja = $doc->createElement('ROL');
    $hoja = $seguimiento->appendChild($hoja);
    //Añadimos el valor texto
    $hoja->appendChild($doc->createTextNode($rol));
    //Definimos hoja (atributo)
    $hoja = $doc->createElement('FECHAINICIO');
    $hoja = $seguimiento->appendChild($hoja);
    //Añadimos el valor texto
    date_default_timezone_set("America/La_Paz");
    $ahora= date("Y-m-d H:i:s");
    $hoja->appendChild($doc->createTextNode($ahora));
    
    $doc->save("C:\\xampp\\htdocs\\proyecto\\xmls\\seguimiento.xml");
}
function existeSeguimiento($id, $proceso){
    $res=-1;
    $seguimientos = simplexml_load_file("C:\\xampp\\htdocs\\proyecto\\xmls\\seguimiento.xml");    
    foreach($seguimientos as $seguimiento){
        if($seguimiento->ID == $id && $seguimiento->PROCESO == $proceso){
            $res=1;
            break;
        }
    }
    return $res;
}
?>