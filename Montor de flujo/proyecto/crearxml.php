<?php
function crearXML(){
    $doc = new DOMDocument('1.0');
    $doc->formatOutput = true;
    
    //Elemento raiz (clase)
    $raiz = $doc->createElement("USUARIOS");
    $raiz = $doc->appendChild($raiz);

    //Definimos instancia (objeto)
    $usuario = $doc->createElement("USUARIO");
    $usuario = $raiz->appendChild($usuario);

    //Definimos los atributos 
    $id = $doc->createElement("ID");
    $id = $usuario->appendChild($id);
    //Asignamos el valor 
    $text = $doc->createTextNode("PT3");
    $text = $id->appendChild($text);

    $nombre = $doc->createElement("NOMBRE");
    $nombre = $usuario->appendChild($nombre);
    //Asignamos el valor 
    $text1 = $doc->createTextNode("Reinaldo");
    $text1 = $nombre->appendChild($text1);

    $app = $doc->createElement("APELLIDO");
    $app = $usuario->appendChild($app);
    //Asignamos el valor 
    $text2 = $doc->createTextNode("Domiguez");
    $text2 = $app->appendChild($text2);

    //Creamos segundo usuario
    $usuario = $doc->createElement("USUARIO");
    $usuario = $raiz->appendChild($usuario);

    //Definimos los atributos 
    $id = $doc->createElement("ID");
    $id = $usuario->appendChild($id);
    //Asignamos el valor 
    $text = $doc->createTextNode("PT2");
    $text = $id->appendChild($text);

    $nombre = $doc->createElement("NOMBRE");
    $nombre = $usuario->appendChild($nombre);
    //Asignamos el valor 
    $text1 = $doc->createTextNode("Rocio");
    $text1 = $nombre->appendChild($text1);

    $app = $doc->createElement("APELLIDO");
    $app = $usuario->appendChild($app);
    //Asignamos el valor 
    $text2 = $doc->createTextNode("Caliman");
    $text2 = $app->appendChild($text2);

    $bytes = $doc->save("C:\\xampp\\htdocs\\proyecto\\xmls\\users.xml");
    echo "Se escribieron ".$bytes." bytes.";
}

function leerXML(){
    $usuarios = simplexml_load_file("C:\\xampp\\htdocs\\proyecto\\xmls\\users.xml");
    foreach($usuarios as $usuario){
        echo "<br>ID: ". $usuario->ID . "<br>Nombre: ".$usuario->NOMBRE."<br>Apellido: ".$usuario->APELLIDO;
    }
}

function escribirXML($id, $nombre, $apellido){
    $doc = new DOMDocument('1.0');
    $doc->formatOutput=true; //para que permita la escritura
    $doc->load("C:\\xampp\\htdocs\\proyecto\\xmls\\users.xml");
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
    $doc->save("C:\\xampp\\htdocs\\proyecto\\xmls\\users.xml");
}
//crearXML();
escribirXML("TV3", "Rosaycela", "Cuñape");
leerXML();

?>