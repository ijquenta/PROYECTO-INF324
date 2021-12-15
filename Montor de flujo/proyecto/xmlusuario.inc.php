<?php
function leerXML(){
    $usuarios = simplexml_load_file("C:\\ServidorXAMPP\\xampp\\htdocs\\proyecto\\xmls\\users.xml");
    /*foreach($usuarios as $usuario){
        echo "<br>ID: ". $usuario->ID . "<br>Nombre: ".$usuario->NOMBRE."<br>Apellido: ".$usuario->APELLIDO;
    }*/
}
function escribirXML($id, $nombre, $apellido, $plantel){
    $doc = new DOMDocument('1.0');
    $doc->formatOutput=true; //para que permita la escritura
    $doc->load("C:\\ServidorXAMPP\\xampp\\htdocs\\proyecto\\xmls\\users.xml");
    //Instancia raiz
    $raiz = $doc->getElementsByTagName("USUARIOS")->item(0);
    //creamos una instancia(nuevo usuario) RAMA
    $usuario = $doc->createElement('USUARIO');
    $usuario = $raiz->appendChild($usuario);
    //Definimos hoja (atributo)
    $hoja = $doc->createElement('ID');
    $hoja = $usuario->appendChild($hoja);
    //Añadimos el valor texto
    $hoja->appendChild($doc->createTextNode($id));

    $hoja = $doc->createElement('NOMBRE');
    $hoja = $usuario->appendChild($hoja);
    //AÑADIMOS el Valor
    $hoja->appendChild($doc->createTextNode($nombre));

    $hoja = $doc->createElement('APELLIDO');
    $hoja = $usuario->appendChild($hoja);
    //Añadimos el valor
    $hoja->appendChild($doc->createTextNode($apellido));

    //definimos atributo
    $hoja = $doc->createElement('PLANTEL');
    $hoja = $usuario->appendChild($hoja);
    //añadimos valor
    $hoja->appendChild($doc->createTextNode($plantel));
    $doc->save("C:\\xampp\\htdocs\\proyecto\\xmls\\users.xml");
}
function buscarUsuario($ci){
    $usuarios = simplexml_load_file("C:\\ServidorXAMPP\\xampp\\htdocs\\proyecto\\xmls\\users.xml");
    $respuesta = -1;
    foreach($usuarios as $usuario){
        if($usuario->ID == $ci){
            $respuesta = $usuario;
            break;
        }
    }
    return $respuesta;
}
function esUsuario($id, $pass){
    $respuesta=-1;
    $usuarios = simplexml_load_file("C:\\ServidorXAMPP\\xampp\\htdocs\\proyecto\\xmls\\users.xml");
    foreach($usuarios as $usuario){
        if($usuario->ID == $id && $usuario->PASS == $pass){
            $respuesta = $usuario;
            break;
        }
    }
    return $respuesta;
}
?>