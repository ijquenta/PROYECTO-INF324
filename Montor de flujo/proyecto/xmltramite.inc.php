<?php
function nuevoTramite(){
    $tramites = simplexml_load_file("C:\\ServidorXAMPP\\xampp\\htdocs\\proyecto\\xmls\\tramites.xml");
    $mayor=0;
    foreach($tramites as $tramite){
        echo $mayor."<br>-->".$tramite->ID."<br>";
        if(intval($tramite->ID) > $mayor){
            $mayor = $tramite->ID;    
        }
    }
    $mayor=$mayor+1;
    return strval($mayor);
}
function escribirTramite($id, $ci){
    //$id = nuevoTramite();
    $doc = new DOMDocument('1.0');
    $doc->formatOutput=true;
    $doc->load("C:\\ServidorXAMPP\\xampp\\htdocs\\proyecto\\xmls\\tramites.xml");
    $raiz = $doc->getElementsByTagName("TRAMITES")->item(0);
    //creamos una instancia(nuevo usuario) RAMA
    $tramite = $doc->createElement('TRAMITE');
    $tramite = $raiz->appendChild($tramite);
    //Definimos hoja (atributo)
    $hoja = $doc->createElement('ID');
    $hoja = $tramite->appendChild($hoja);
    //Añadimos el valor texto
    $hoja->appendChild($doc->createTextNode($id));

    $hoja = $doc->createElement('CI');
    $hoja = $tramite->appendChild($hoja);
    //AÑADIMOS el Valor
    $hoja->appendChild($doc->createTextNode($ci));
    //guardamos
    $doc->save("C:\\ServidorXAMPP\\xampp\\htdocs\\proyecto\\xmls\\tramites.xml");
}
function tramiteUsuario($usuario){
    $tramites = simplexml_load_file("C:\\ServidorXAMPP\\xampp\\htdocs\\proyecto\\xmls\\tramites.xml");
    $nrotramite = -1;
    foreach($tramites as $tramite){
        if($tramite->CI == $usuario){
            $nrotramite = $tramite->CI;
            break;
        }
    }
    return $nrotramite;
}
?>